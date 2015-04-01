Datzteams.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('datzteams.management')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,items: [{
                title: _('datzteams')
                ,defaults: { autoHeight: true }
                ,items: [{
                    html: '<p>'+_('datzteams.management_desc')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'datzteams-grid-datzteams'
                    ,cls: 'main-wrapper'
                    ,preventRender: true
                }]
            }]
        }]
    });
    Datzteams.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.panel.Home,MODx.Panel);
Ext.reg('datzteams-panel-home',Datzteams.panel.Home);
