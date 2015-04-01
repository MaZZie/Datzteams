Ext.onReady(function() {
    MODx.load({ xtype: 'datzteams-page-home'});
});

Datzteams.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{ xtype: 'datzteams-panel-home',renderTo: 'datzteams-panel-home-div'
        }]
    });
    Datzteams.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.page.Home,MODx.Component);
Ext.reg('datzteams-page-home',Datzteams.page.Home);
