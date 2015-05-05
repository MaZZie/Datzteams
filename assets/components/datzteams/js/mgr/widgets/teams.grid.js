Datzteams.grid.Datzteams_teams = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'datzteams-grid-datzteams-teams'
        ,url: Datzteams.config.connectorUrl
        ,baseParams: { action: 'mgr/datzteams/teams/teams_getList' }
        ,save_action: 'mgr/datzteams/teams/teams_updateFromGrid'
        ,fields: ['id','name','tag','intern','skill','game','platform','clanbase','esl','menu']
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
            header: _('datzteams.tag')
            ,dataIndex: 'tag'
            ,sortable: true
            ,width: 120
            ,editor: { xtype: 'textfield' }
        },{
            header: _('datzteams.intern')
            ,dataIndex: 'intern'
            ,sortable: false
            ,width: 100
            ,editor: { xtype: 'checkbox' }
        }]
        ,tbar: [{
            text: _('datzteams.datzteam_create')
            ,handler: { xtype: 'datzteams-window-datzteam-create' ,blankValues: true }
        },'->',{
            xtype: 'textfield'
            ,id: 'datzteams-search-filter'
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
    Datzteams.grid.Datzteams_teams.superclass.constructor.call(this,config)
};
Ext.extend(Datzteams.grid.Datzteams_teams,MODx.grid.Grid,{
    search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
    ,getMenu: function() {
        return [{
            text: _('datzteams.datzteam_manage')
            ,handler: this.manageDatzteam
        },'-',{
            text: _('datzteams.datzteam_update')
            ,handler: this.updateDatzteam
        },'-',{
            text: _('datzteams.datzteam_remove')
            ,handler: this.removeDatzteam
        }];
    }
    ,updateDatzteam: function(btn,e) {
        if (!this.updateDatzteamWindow) {
            this.updateDatzteamWindow = MODx.load({
                xtype: 'datzteams-window-datzteam-update'
                ,record: this.menu.record
                ,listeners: {
                    'success': {fn:this.refresh,scope:this}
                }
            });
        }
        this.updateDatzteamWindow.setValues(this.menu.record);
        this.updateDatzteamWindow.show(e.target);
    }
    ,manageDatzteam: function() {
        location.href = '?a=teammanager&namespace=datzteams&team='+this.menu.record.id;
    }
    ,removeDatzteam: function() {
        MODx.msg.confirm({
            title: _('datzteams.datzteam_remove')
            ,text: _('datzteams.datzteam_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/datzteams/teams/teams_remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:this.refresh,scope:this}
            }
        });
    }
});
Ext.reg('datzteams-grid-datzteams-teams',Datzteams.grid.Datzteams_teams);


Datzteams.window.CreateDatzteam = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('datzteams.datzteam_create')
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/teams/teams_create'
        }
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('datzteams.name')
            ,name: 'name'
            ,allowBlank: 'false'
            ,anchor: '100%'
        },{
             xtype: 'textfield'
            ,fieldLabel: _('tag')
            ,name: 'tag'
            ,allowBlank: 'false'
            ,anchor: '100%'
        },{
             xtype: 'checkbox'
            ,fieldLabel: _('datzteams.intern')
            ,name: 'intern'
            ,inputValue: 1
            ,anchor: '100%'
        },{
             xtype: 'textfield'
            ,fieldLabel: ('Clanbase ID')
            ,name: 'clanbase'
            ,allowBlank: 'true'
            ,anchor: '100%'
        },{
             xtype: 'textfield'
            ,fieldLabel: ('ESL ID')
            ,name: 'esl'
            ,allowBlank: 'true'
            ,anchor: '100%'
        }]
    });
    Datzteams.window.CreateDatzteam.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.window.CreateDatzteam,MODx.Window);
Ext.reg('datzteams-window-datzteam-create',Datzteams.window.CreateDatzteam);


Datzteams.window.UpdateDatzteam = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('datzteams.datzteam_update')
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/teams/teams_update'
        }
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('datzteams.name')
            ,name: 'name'
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: _('datzteams.tag')
            ,name: 'tag'
            ,anchor: '100%'
        }]
    });
    Datzteams.window.UpdateDatzteam.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.window.UpdateDatzteam,MODx.Window);
Ext.reg('datzteams-window-datzteam-update',Datzteams.window.UpdateDatzteam);
