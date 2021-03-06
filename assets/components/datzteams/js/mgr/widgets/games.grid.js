Datzteams.grid.Datzteams_games = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'datzteams-grid-datzteams-games'
        ,url: Datzteams.config.connectorUrl
        ,baseParams: { action: 'mgr/datzteams/games/games_getList' }
        ,save_action: 'mgr/datzteams/games/games_updateFromGrid'
        ,fields: [ 'id', 'name', 'shortname', 'menu']
        ,paging: true
        ,autosave: true
        ,remoteSort: true
        ,anchor: '97%'
        ,autoExpandColumn: 'name'
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,sortable: true
            ,width: 60
        },{
            header: _('datzteams.name')
            ,dataIndex: 'name'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },{
            header: _('datzteams.shortname')
            ,dataIndex: 'shortname'
            ,sortable: true
            ,width: 120
            ,editor: { xtype: 'textfield' }
        }]
        ,tbar: [{
            text: _('datzteams.datzteam_create')
            ,handler: { xtype: 'datzteams-window-datzteam-games-create' ,blankValues: true }
        },'->',{
            xtype: 'textfield'
            ,id: 'datzteams-games-search-filter'
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
    Datzteams.grid.Datzteams_games.superclass.constructor.call(this,config)
};
Ext.extend(Datzteams.grid.Datzteams_games,MODx.grid.Grid,{
    search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
    ,getMenu: function() {
        return [{
            text: _('datzteams.datzteam_update')
            ,handler: this.updateDatzteamGames
        },'-',{
            text: _('datzteams.datzteam_remove')
            ,handler: this.removeDatzteamGames
        }];
    }
    ,updateDatzteamGames: function(btn,e) {
        if (!this.updateDatzteamGamesWindow) {
            this.updateDatzteamGamesWindow = MODx.load({
                xtype: 'datzteams-window-datzteam-games-update'
                ,record: this.menu.record
                ,listeners: {
                    'success': {fn:this.refresh,scope:this}
                }
            });
        }
        this.updateDatzteamGamesWindow.setValues(this.menu.record);
        this.updateDatzteamGamesWindow.show(e.target);
    }

    ,removeDatzteamGames: function() {
        MODx.msg.confirm({
            title: _('datzteams.datzteam_remove')
            ,text: _('datzteams.datzteam_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/datzteams/games/games_remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:this.refresh,scope:this}
            }
        });
    }
});
Ext.reg('datzteams-grid-datzteams-games',Datzteams.grid.Datzteams_games);


Datzteams.window.CreateDatzteamGames = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: ('Create Game')
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/games/games_create'
        }
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('datzteams.name')
            ,name: 'name'
            ,allowBlank: 'false'
            ,anchor: '100%'
        },{
             xtype: 'textfield'
            ,fieldLabel: ('Shortname')
            ,name: 'shortname'
            ,allowBlank: 'false'
            ,anchor: '100%'
        }]
    });
    Datzteams.window.CreateDatzteamGames.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.window.CreateDatzteamGames,MODx.Window);
Ext.reg('datzteams-window-datzteam-games-create',Datzteams.window.CreateDatzteamGames);


Datzteams.window.UpdateDatzteamGames = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('datzteams.datzteam_update')
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/games/games_update'
        }
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
        },{
            xtype: 'textfield'
            ,fieldLabel: ('Game')
            ,name: 'name'
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: ('Shortname')
            ,name: 'shortname'
            ,anchor: '100%'
        }]
    });
    Datzteams.window.UpdateDatzteamGames.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.window.UpdateDatzteamGames,MODx.Window);
Ext.reg('datzteams-window-datzteam-games-update',Datzteams.window.UpdateDatzteamGames);
