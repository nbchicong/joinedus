/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 18/05/2016
 * Time: 6:00 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: ${FILE_NAME}
 * @package: ${NAMESPACE}
 * @author: nbchicong
 */
$(function () {
  /**
   * @class UI.ListItem
   * @extends UI.Component
   * @constructor
   */
  UI.ListItem = function (config) {
    var _this = this;
    BaseUI.apply(this, config || {});
    _this.element = this.element || '#list-items';
    _this.actions = this.actions || [{
      title: 'Xóa',
      icon: 'fa fa-trash',
      actionName: 'remove',
      actionFn: BaseUI.emptyFn
    }];
    _this.idProperties = _this.idProperties || 'id';
    _this.store = new Hashtable();
  };
  BaseUI.extend(UI.ListItem, UI.Component, {
    getEl: function () {
      return $(this.element);
    },
    getIdProperties: function () {
      return this.idProperties;
    },
    setGrid: function (grid) {
      this.grid = grid;
    },
    getGrid: function () {
      return this.grid;
    },
    removeRow: function (rowsId) {
      this.getEl().find('#'+rowsId).remove();
    }
  });
});
