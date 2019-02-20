var AdminMain = {
    deleteFile: function (obj, path) {
        let wrap = obj.parents('.image-upload-wrap:first');
        let thumbnail = obj.parents('.img-thumbnail:first');
        let _self = this;
        _self.openLoading(thumbnail);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'get',
            url: path,
            data: {
                ajax: 1
            },
            dataType: 'json',
            success: function (res) {
                if (res.status == 'success') {
                    wrap.hide();
                }
            },
            error: function (err) {
                console.log(err);
            },
            complete: function () {
                _self.closeLoading(thumbnail);
            }
        })
    },
    iCheck: function () {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })
    },
    checkAllToggle: function (trigger = ".check-all-trigger", target = ".check-all-target") {
        $(trigger).on("ifToggled", function (e) {
            $(target).iCheck(e.target.checked ? 'check' : 'uncheck');
        });
    },
    bulkAction: function (action, frmId = '#bulk-action-frm') {
        AdminActions.confirm().then((result) => {
            if (result.value) {
                $(frmId).prop("action", action).submit();
            }
        });
    },
    ckEditorInit: function (token) {

        if (!$('#contentInput').length) return false;

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&responseType=json&_token=' + token,
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&responseType=json&_token=' + token
        };

        CKEDITOR.replace('contentInput', options);
    },
    openLoading: function (ele) {
        ele.loading({
            overlay: $("#loading-overlay")
        });
    },
    closeLoading: function (ele) {
        ele.loading('stop');
    },
    select2Init: function () {
        $('.select2-input').select2();
    },
    setIsContinue: function (objThis, value) {
        objThis.parents('form:first').find('#is_continue').val(value);
    },
    dropdownInput: function (obj, valueClass = ".dropdownValue", labelClass = ".dropdownLabel") {
        let val = obj.attr("val");
        let text = obj.attr("text");
        let labelObj = obj.parents(".form-dropdown:first").find(labelClass);
        let valueObj = obj.parents(".form-dropdown:first").find(valueClass);
        labelObj.text(text);
        valueObj.val(val);
    },
    dropdownInputDefault: function (valueClass = "input.dropdownValue") {
        $.each($(valueClass), function (index, obj) {
            let val = $(obj).val();
            let option = $(obj).parents(".form-dropdown:first").find("ul.dropdown-menu li[val='" + val + "']");
            option.trigger("click");
        })
    },
    dropdownInit: function() {
        let _self = this;
        let options = $(".form-dropdown ul.dropdown-menu li");

        $.each(options, function (index, option) {
            $(option).click(function() {
                _self.dropdownInput($(this));
            });
        });

        _self.dropdownInputDefault();
    }
}

var AdminActions = {
    confirm: function () {
        return swal({
            title: Lang.get('admin/global.are_you_sure'),
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: Lang.get('admin/global.yes'),
            cancelButtonText: Lang.get('admin/global.no')
        });
    },
    confirmDelete: function (url) {
        this.confirm().then((result) => {
            if (result.value) {
                window.location = url;
            }
        });
    }
}

var Order = {
    actions: {
        changeStatusByDropdown: function() {
            let frm = $("#changeStatusByDropdownFrm");
            let statusInput = frm.find("#statusDropdownValue");
            let paymentStatusInput = frm.find("#paymentStatusDropdownValue");
            let optionsObj = frm.find(".statusDropdownOption");

            $.each(optionsObj, function (i, obj) {
                $(obj).click(function () {
                    let dataType = $(this).attr('data-type');
                    let dataValue = $(this).attr('data-value');

                    if (dataType == 'order_status') {
                        statusInput.val(dataValue);
                    } else if (dataType == 'payment_status') {
                        paymentStatusInput.val(dataValue);
                    }

                    frm.submit();
                })
            })
        }
    }
};