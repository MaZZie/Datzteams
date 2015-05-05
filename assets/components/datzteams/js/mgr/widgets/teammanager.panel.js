Datzteams.panel.Teammanager = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+('Teammanagement')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,items: [{ //start players tab
                title: _('datzteams.players')
                ,defaults: { autoHeight: true }
                ,items: [{
                    html: '<p>'+('Manage team')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'datzteams-grid-datzteams-players'
                    ,cls: 'main-wrapper'
                    ,preventRender: true
                }]
            }]
            ,listeners: {
                'afterrender': function(tabPanel) {
                    tabPanel.doLayout();
                }
            }
        }]
    });
    Datzteams.panel.Teammanager.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams.panel.Teammanager,MODx.Panel);
Ext.reg('datzteams-panel-home',Datzteams.panel.Teammanager);
