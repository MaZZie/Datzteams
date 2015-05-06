Datzteams.combo.Games = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'games'
        ,hiddenName: 'name'
        ,displayField: 'name'
        ,valueField: 'id'
        ,fields: ['id','name']
        ,forceSelection: true
        ,typeAhead: false
        ,editable: false
        ,allowBlank: false
        ,listWidth: 300
        ,emptyText: 'Select a game...'
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/games/games_getlist'
            ,combo: true
        }
    });
    Datzteams.combo.Games.superclass.constructor.call(this,config);
};

Ext.extend(Datzteams.combo.Games,MODx.combo.ComboBox);
Ext.reg('datzteams-combo-games',Datzteams.combo.Games);


Datzteams.combo.Platform = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'platforms'
        ,hiddenName: 'name'
        ,displayField: 'name'
        ,valueField: 'id'
        ,fields: ['id','name']
        ,forceSelection: true
        ,typeAhead: false
        ,editable: false
        ,allowBlank: false
        ,listWidth: 300
        ,emptyText: 'Select a game...'
        ,url: Datzteams.config.connectorUrl
        ,baseParams: {
            action: 'mgr/datzteams/platforms/platforms_getlist'
            ,combo: true
        }
    });
    Datzteams.combo.Platform.superclass.constructor.call(this,config);
};

Ext.extend(Datzteams.combo.Platform,MODx.combo.ComboBox);
Ext.reg('datzteams-combo-platforms',Datzteams.combo.Platform);
