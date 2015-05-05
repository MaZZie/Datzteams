Datzteams.grid.Datzteams_platforms = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'datzteams-grid-datzteams-platforms'
        ,url: Datzteams.config.connectorUrl
        ,baseParams: { action: 'mgr/datzteams/platforms/platforms_getList' }
        ,save_action: 'mgr/datzteams/platforms/platforms_updateFromGrid'
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
            ,handler: { xtype: 'datzteams-window-datzteam-platforms-create' ,blankValues: true }
        },'->',{
            xtype: 'textfield'
            ,id: 'datzteams-platforms-search-filter'
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
    Datzteams.grid.Datzteams_platforms.superclass.constructor.call(this,config)
};
Ext.extend(Datzteams.grid.Datzteams_platforms,MODx.grid.Grid,{
    search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
    ,getMenu: function() {
        return [{
            text: _('datzteams.datzteam_update')
            ,handler: this.updateDatzteamPlatforms
        },'-',{
            text: _('datzteams.datzteam_remove')
            ,handler: this.removeDatzteamPlatforms
        }];
    }
    ,updateDatzteamPlatforms: function(btn,e) {
        if (!this.updateDatzteamPlatformsWindow) {
            this.updateDatzteamPlatformsWindow = MODx.load({
                xtype: 'datzteams-window-datzteam-platforms-update'
                ,record: this.menu.record
                ,listeners: {
                    'success': {fn:this.refresh,scope:this}
                }
            });
        }
        this.updateDatzteamPlatformsWindow.setValues(this.menu.record);
        this.updateDatzteamPlatformsWindow.show(e.target);
    }

    ,removeDatzteamPlatforms: function() {
        MODx.msg.confirm({
            title: _('datzteams.datzteam_remove')
            ,text: _('datzteams.datzteam_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/datzteams/platforms/platforms_remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:this.refresh,scope:this}
            }
        });
    }
});
Ext.reg('datzteams-grid-datzteams-platforms',Datzteams.grid.Datzteams_platforms);


Datzteams.window.CreateDatzteamPlatforms = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: ('Create Platform')
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/platforms/platforms_create'
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
    Datzteams.window.CreateDatzteamPlatforms.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.window.CreateDatzteamPlatforms,MODx.Window);
Ext.reg('datzteams-window-datzteam-platforms-create',Datzteams.window.CreateDatzteamPlatforms);


Datzteams.window.UpdateDatzteamPlatforms = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('datzteams.datzteam_update')
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/platforms/platforms_update'
        }
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
        },{
            xtype: 'textfield'
            ,fieldLabel: ('Platform')
            ,name: 'name'
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: ('Shortname')
            ,name: 'shortname'
            ,anchor: '100%'
        }]
    });
    Datzteams.window.UpdateDatzteamPlatforms.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.window.UpdateDatzteamPlatforms,MODx.Window);
Ext.reg('datzteams-window-datzteam-platforms-update',Datzteams.window.UpdateDatzteamPlatforms);
