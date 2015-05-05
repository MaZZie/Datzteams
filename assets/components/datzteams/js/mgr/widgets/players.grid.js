Datzteams.grid.Datzteams_players = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'datzteams-grid-datzteams-players'
        ,url: Datzteams.config.connectorUrl
        ,baseParams: { action: 'mgr/datzteams/players/players_getList'
                      ,team: MODx.request.team}
        ,save_action: 'mgr/datzteams/players/players_updateFromGrid'
        ,fields: [ 'id','username','position','menu']
        ,paging: true
        ,autosave: true
        ,remoteSort: true
        ,anchor: '97%'
        ,autoExpandColumn: 'username'
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,sortable: true
            ,width: 60
        },{
            header: ('Player')
            ,dataIndex: 'username'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },{
            header: ('Position')
            ,dataIndex: 'position'
            ,sortable: true
            ,width: 120
            ,editor: { xtype: 'textfield' }
        }]
        ,tbar: [{
            text: ('Add Player')
            ,handler: { xtype: 'datzteams-window-datzteam-players-create' ,blankValues: true }
        },'->',{
            xtype: 'textfield'
            ,id: 'datzteams-players-search-filter'
            ,emptyText: _('datzteams.search...')
            ,listeners: {
                'change': {fn:this.search,scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: function() {
                            this.fireEvent('change',this);
                            this.blur();
                            return true;
                        }
                        ,scope: cmp
                    });
                },scope:this}
            }
        }]
    });
    Datzteams.grid.Datzteams_players.superclass.constructor.call(this,config)
};
Ext.extend(Datzteams.grid.Datzteams_players,MODx.grid.Grid,{
    search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
    ,getMenu: function() {
        return [{
            text: ('Update Player')
            ,handler: this.updateDatzteamPlayers
        },'-',{
            text: ('Remove player')
            ,handler: this.removeDatzteamPlayers
        }];
    }
    ,updateDatzteamPlayers: function(btn,e) {
        if (!this.updateDatzteamPlayersWindow) {
            this.updateDatzteamPlayersWindow = MODx.load({
                xtype: 'datzteams-window-datzteam-players-update'
                ,record: this.menu.record
                ,listeners: {
                    'success': {fn:this.refresh,scope:this}
                }
            });
        }
        this.updateDatzteamPlayersWindow.setValues(this.menu.record);
        this.updateDatzteamPlayersWindow.show(e.target);
    }

    ,removeDatzteamPlayers: function() {
        MODx.msg.confirm({
            title: _('datzteams.datzteam_remove')
            ,text: _('datzteams.datzteam_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/datzteams/players/players_remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:this.refresh,scope:this}
            }
        });
    }
});
Ext.reg('datzteams-grid-datzteams-players',Datzteams.grid.Datzteams_players);


Datzteams.window.CreateDatzteamPlayers = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: ('Add player')
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/players/players_create'
        }
        ,fields: [{
            xtype: 'textfield'
            ,name: 'teamid'
            ,allowBlank: 'false'
            ,value: MODx.request.team
            ,hidden: false
        },{
            xtype: 'modx-combo-user'
            ,fieldLabel: ('Player')
            ,name: 'player'
            ,hiddenName: 'player'
            ,allowBlank: 'false'
            ,anchor: '100%'
        },{
             xtype: 'textfield'
            ,fieldLabel: ('Position')
            ,name: 'position'
            ,allowBlank: 'false'
            ,anchor: '100%'
        }]
    });
    Datzteams.window.CreateDatzteamPlayers.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.window.CreateDatzteamPlayers,MODx.Window);
Ext.reg('datzteams-window-datzteam-players-create',Datzteams.window.CreateDatzteamPlayers);


Datzteams.window.UpdateDatzteamPlayers = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: ('Update player')
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/players/players_update'
        }
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
        },{
            xtype: 'textfield'
            ,fieldLabel: ('Posiition')
            ,name: 'position'
            ,anchor: '100%'
        }]
    });
    Datzteams.window.UpdateDatzteamPlayers.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.window.UpdateDatzteamPlayers,MODx.Window);
Ext.reg('datzteams-window-datzteam-players-update',Datzteams.window.UpdateDatzteamPlayers);
