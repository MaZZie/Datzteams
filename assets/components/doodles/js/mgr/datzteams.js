var Datzteams = function(config) {
    config = config || {};
    Datzteams.superclass.constructor.call(this,config);
};
Ext.extend(Datzteams,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('datzteams',Datzteams);

Datzteams = new Datzteams();
