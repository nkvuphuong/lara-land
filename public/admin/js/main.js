var AdminMain = {
    deleteFile: function (obj, path) {
        let wrap = obj.parents('.image-upload-wrap:first');
        let loading = Ladda.create(obj[0]);
        loading.start();
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
                loading.stop();
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
        $(trigger).change((e) => {
            $(target).prop("checked", $(e.target).is(':checked'));
        });
    },
    bulkAction: function (action, frmId = '#bulk-action-frm') {
        AdminActions.confirm().then((result) => {
            if (result) {
                $(frmId).prop("action", action).submit();
            }
        });
    },
    ckEditorInit: function (token) {

        let editorId = '#contentInput';

        if (!$(editorId).length) return false;

        var options = {
            filebrowserImageBrowseUrl: '/' + GlobalOptions.lfmUrlPrefix + '/?type=Images',
            filebrowserImageUploadUrl: '/' + GlobalOptions.lfmUrlPrefix + '/upload?type=Images&responseType=json&_token=' + token,
            filebrowserBrowseUrl: '/' + GlobalOptions.lfmUrlPrefix + '/?type=Files',
            filebrowserUploadUrl: '/' + GlobalOptions.lfmUrlPrefix + '/upload?type=Files&responseType=json&_token=' + token
        };

        CKEDITOR.replace('contentInput', options);
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
    dropdownInit: function () {
        let _self = this;
        let options = $(".form-dropdown ul.dropdown-menu li");

        $.each(options, function (index, option) {
            $(option).click(function () {
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
            buttons: true,
            icon: "warning",
        });
    },
    confirmDelete: function (url) {
        this.confirm().then((result) => {
            if (result) {
                window.location = url;
            }
        });
    }
}