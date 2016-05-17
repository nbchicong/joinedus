/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 18/05/2016
 * Time: 5:19 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: CategoryEntity
 * @package: ${NAMESPACE}
 * @author: nbchicong
 */
$(function () {
  /**
   * @class UI.CategoryEntity
   * @extends UI.Entity
   */
  UI.CategoryEntity = function () {
    var _this = this;
    this.id = 'category-entity';
    this.submitType = 'JSON';
    this.$toolbar = {
      CREATE: $('#btn-add')
    };
    this.url = {
      list: ('agency/cash/list'),
      create: ('category/create'),
      update: ('category/update')
    };
    this.$listItem = $('#list-item');
    this.$modalAdd = $('#modal-category');
    this.$txtName = $('#txt-cate-name');
    this.$cbbParent = $('#cbb-cate-parent');
    this.$toolbar.CREATE.on('click', function () {
      _this.clear();
    });
    this.$modalAdd.on('click', 'button[data-action]', function () {
      _this[_this.getAction(this)].call(_this);
    });
    UI.CategoryEntity.superclass.constructor.call(this);
  };
  BaseUI.extend(UI.CategoryEntity, UI.Entity, {
    clear: function () {
      this.setEntityId(null);
      this.$modalAdd.find('input').val('');
    },
    setFormData: function (data) {
      this.$txtName.val(data.name);
      this.$cbbParent.val(data.parentCateId);
    },
    getFormData: function () {
      return {
        name: this.$txtName.val(),
        parentCateId: this.$cbbParent.val()
      };
    },
    // editRow: function (row) {
    //   this.setEntityId(row[this.getIdProperties()]);
    //   this.setFormData(row);
    //   this.$modalTransaction.modal('show');
    // },
    save: function () {
      var _this = this;
      var __data = this.getFormData();
      if (!BaseUI.isEmpty(this.getEntityId())) {
        __data.id = this.getEntityId();
        this.setParams(__data);
        this.update(function () {
          console.log('%cUpdate success', 'color: #00FF00');
        })
      } else {
        this.setParams(__data);
        this.create(function (data) {
          _this.responseHandle(data, function () {
            console.log('%cCreate success', 'color: #00FF00');
          });
        });
      }
    }//,
    // removeRow: function (row) {
    //   var _this = this;
    //   this.setEntityId(row[this.getIdProperties()]);
    //   this.setParams(this.getEntityById(this.getEntityId()));
    //   this.remove(function (data) {
    //     _this.responseHandle(data, function () {
    //       if (_this.removeEntityById(_this.getEntityId())) {
    //         _this.grid.removeRowById(_this.getEntityId());
    //       }
    //     });
    //   });
    // }
  });
  new UI.CategoryEntity();
});
