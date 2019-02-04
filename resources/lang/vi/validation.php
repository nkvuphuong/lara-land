<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute phải được chấp nhận.',
    'active_url'           => ':attribute không phải URL hợp lệ.',
    'after'                => ':attribute phải sau ngày :date.',
    'after_or_equal'       => ':attribute phải sau hoặc bằng ngày :date.',
    'alpha'                => ':attribute chỉ có thể chứa ký tự.',
    'alpha_dash'           => ':attribute chỉ có thể chứ ký tự, số, và dấu chấm.',
    'alpha_num'            => ':attribute chỉ có thể chứa ký tự và số.',
    'array'                => ':attribute phải là mảng.',
    'before'               => ':attribute phải trước ngày :date.',
    'before_or_equal'      => ':attribute phải trước hoặc bằng ngày :date.',
    'between'              => [
        'numeric' => ':attribute phải ở khoảng giữa :min và :max.',
        'file'    => ':attribute phải ở khoảng giữa :min và :max kilobytes.',
        'string'  => ':attribute phải ở khoảng giữa :min và :max ký tự.',
        'array'   => ':attribute phải ở khoảng giữa :min và :max mục.',
    ],
    'boolean'              => 'Trường :attribute chỉ có thể có giả trị true hoặc false.',
    'confirmed'            => ':attribute xác nhận không trùng khớp.',
    'date'                 => ':attribute không phải là ngày hợp lệ.',
    'date_format'          => ':attribute không phải định dạng hợp lệ :format.',
    'different'            => ':attribute và :other phải khác nhau.',
    'digits'               => ':attribute phải là chữ số :digits.',
    'digits_between'       => ':attribute phải ở khoảng giữa chữ số :min và :max.',
    'dimensions'           => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'             => 'Trường :attribute có giá trị trùng lặp.',
    'email'                => ':attribute phải là định dạng email.',
    'exists'               => 'Lựa chọn :attribute không hợp lệ.',
    'file'                 => ':attribute phải là tập tin.',
    'filled'               => 'Trường :attribute phải là giá trị.',
    'image'                => ':attribute phải là hình ảnh.',
    'in'                   => 'Lựa chọn :attribute không hợp lệ.',
    'in_array'             => 'Trường :attribute không tồn tại trong :other.',
    'integer'              => ':attribute phải là số nguyên.',
    'ip'                   => ':attribute phải có định dang IP.',
    'ipv4'                 => ':attribute phải có định dang IP4.',
    'ipv6'                 => ':attribute phải có định dang IPv6.',
    'json'                 => ':attribute phải là chuỗi JSON.',
    'max'                  => [
        'numeric' => ':attribute không thể lớn hơn :max.',
        'file'    => ':attribute không thể lớn hơn :max kilobytes.',
        'string'  => ':attribute không thể lớn hơn :max ký tự.',
        'array'   => ':attribute không thể lớn hơn :max mục.',
    ],
    'mimes'                => ':attribute phải là tập tin có định dạng: :values.',
    'mimetypes'            => ':attribute phải là tập tin có định dạng: :values.',
    'min'                  => [
        'numeric' => ':attribute phải có ít nhất :min.',
        'file'    => ':attribute phải có ít nhất :min kilobytes.',
        'string'  => ':attribute phải có ít nhất :min ký tự.',
        'array'   => ':attribute phải có ít nhất:min mục.',
    ],
    'not_in'               => ':attribute đã chọn không hợp lệ.',
    'numeric'              => ':attribute phải là số.',
    'present'              => ':attribute phải có sẵn.',
    'regex'                => ':attribute định dạng không hợp lệ.',
    'required'             => ':attribute bắt buộc.',
    'required_if'          => ':attribute bắt buộc khi :other là :value.',
    'required_unless'      => ':attribute bắt buộc trừ khi :other thuộc :values.',
    'required_with'        => ':attribute bắt buộc khi :values có sẵn.',
    'required_with_all'    => ':attribute bắt buộc khi :values có sẵn.',
    'required_without'     => ':attribute bắt buộc khi :values không có sẵn.',
    'required_without_all' => ':attribute bắt buộc khi không có bất kỳ :values có sẵn.',
    'same'                 => ':attribute và :other phải trùng khớp.',
    'size'                 => [
        'numeric' => ':attribute phải có kích thước :size.',
        'file'    => ':attribute phải có kích thước :size kilobytes.',
        'string'  => ':attribute phải có kích thước :size ký tự.',
        'array'   => ':attribute phải chứa :size mục.',
    ],
    'string'               => ':attribute phải là chuỗi.',
    'timezone'             => ':attribute phải nằm trong vùng giá trị hợp lệ.',
    'unique'               => ':attribute đã được thực hiện.',
    'uploaded'             => ':attribute tải lên thất bại.',
    'url'                  => ':attribute định dạng không hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
