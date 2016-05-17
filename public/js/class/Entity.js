/** 
 * #PACKAGE: class
 * #MODULE: entity
 */
/**
 * @license Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong<nbchicong@gmail.com>
 *         on 25/03/2016.
 * -------------------------------------------
 * @project base-ui
 * @file Entity
 * @author nbchicong
 */
$(function () {
  /**
   *
   * @class UI.Entity
   * @extends UI.Clazz
   * @param options
   * @constructor
   */
  UI.Entity = function (options) {
    BaseUI.apply(this, options || {});
    this.id = this.id || 'content';
    this.idProperties = this.idProperties || 'id';
    this.entityId = this.entityId || null;
    this.request = null;
    this.submitType = this.submitType || 'JSON';
    this.grid = this.grid || null;
    this.url = this.url || {
      list: '',
      create: '',
      update: '',
      remove: ''
    };
    UI.Entity.superclass.constructor.call(this, options || {});
  };
  BaseUI.extend(UI.Entity, UI.Clazz, {
    setEntityId: function (id) {
      this.entityId = id;
    },
    getEntityId: function () {
      return this.entityId;
    },
    setParams: function (params) {
      this.params = params;
    },
    getParams: function () {
      return this.params || {};
    },
    setSubmitType: function (type) {
      this.submitType = type;
    },
    getSubmitType: function () {
      return this.submitType;
    },
    getIdProperties: function () {
      return this.idProperties;
    },
    // pushAll: function (data) {
    //   var __data = data || [];
    //   for (var i = 0; i < __data.length; i++) {
    //     this.setEntityById(__data[i][this.getIdProperties()], __data[i]);
    //   }
    // },
    getGrid: function () {
      return this.grid;
    },
    getEntityById: function (id) {
      if (this.getGrid()) {
        return this.getGrid().getRecordById(id);
      }
      return null;
    },
    setEntityById: function (id, entity) {
      if (this.getGrid()) {
        this.getGrid().setRecordById(id, entity);
      }
    },
    removeEntityById: function (id) {
      if (this.getGrid()) {
        this.getGrid().removeRecordById(id);
      }
    },
    convertData: function (dataJson) {
      if (this.getGrid()) {
        return this.getGrid().responseHandler(dataJson);
      }
      return {
        current: 0,
        rowCount: 10,
        rows: [],
        total: 0
      };
    },
    getAction: function (el) {
      var $el = $(el);
      var __actionArr = $el.attr('data-action').split('-');
      var __actionName = '';
      for (var i = 0; i < __actionArr.length; i ++) {
        __actionName += (i == 0 ? __actionArr[i] : __actionArr[i].capitalize());
      }
      return __actionName;
    },
    sendAjax: function (options, callback) {
      var __fn = callback || BaseUI.emptyFn;
      options.success = function (data) {
        __fn(data);
      };
      if (this.getSubmitType()=='JSON') {
        delete options.dataType;
        delete options.contentType;
      }
      this.request = $.ajax(options);
    },
    load: null,
    create: function (callback) {
      var __params = this.getParams();
      var __fn = callback || BaseUI.emptyFn;
      if (!BaseUI.isEmpty(__params)) {
        this.sendAjax({
          url: this.url.create,
          method: 'POST',
          data: (this.getSubmitType()=='JSON_STRING'?JSON.stringify(__params):__params),
          dataType: 'JSON',
          contentType: 'application/json'
        }, __fn);
      } else {
        console.log('%cParams can not empty when change data', 'color: #FF0000');
      }
    },
    update: function (callback) {
      var __params = this.getParams();
      var __fn = callback || BaseUI.emptyFn;
      if (!BaseUI.isEmpty(__params)) {
        this.sendAjax({
          url: this.url.update,
          method: 'POST',
          data: (this.getSubmitType()=='JSON_STRING'?JSON.stringify(__params):__params),
          dataType: 'JSON',
          contentType: 'application/json'
        }, __fn);
      } else {
        console.log('%cParams can not empty when change data', 'color: #FF0000');
      }
    },
    remove: function (callback) {
      var __params = this.getParams();
      var __fn = callback || BaseUI.emptyFn;
      if (!BaseUI.isEmpty(__params)) {
        this.sendAjax({
          url: this.url.remove,
          method: 'POST',
          data: (this.getSubmitType()=='JSON_STRING'?JSON.stringify(__params):__params),
          dataType: 'JSON',
          contentType: 'application/json'
        }, __fn);
      } else {
        console.log('%cParams can not empty when change data', 'color: #FF0000');
      }
    },
    uploadFile: function (files, callback) {
      var __fd = new FormData();
      var __files = files || [];
      var __fn = callback || function(){};
      for(var i = 0; i < __files.length; i++) {
        var __file = __files[i];
        __fd.append('name', __file.name);
        __fd.append('file', __file);
      }
      $.ajax({
        url: this.url.upload,
        method: 'POST',
        data: __fd,
        dataType: 'JSON',
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
          __fn(response);
        }
      });
    }
  });
});