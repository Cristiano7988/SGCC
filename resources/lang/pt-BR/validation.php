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

    'accepted' => ':attribute deve ser aceito(a).',
    'accepted_if' => ':attribute deve ser aceito(a) quando :other é :value.',
    'active_url' => ':attribute não é uma URL válida.',
    'after' => ':attribute deve ser uma data posterior a :date.',
    'after_or_equal' => ':attribute deve ser uma data posterior ou igual a :date.',
    'alpha' => ':attribute deve conter apenas letras.',
    'alpha_dash' => ':attribute deve conter apenas letras, números, traços e underlines.',
    'alpha_num' => ':attribute deve conter apenas letras e números.',
    'array' => ':attribute deve ser um array.',
    'before' => ':attribute deve ser no mínimo anterior a :date.',
    'before_or_equal' => ':attribute deve ser uma data anterior ou igual a :date.',
    'between' => [
        'numeric' => ':attribute deve estar entre :min e :max.',
        'file' => ':attribute deve estar entre :min e :max kilobytes.',
        'string' => ':attribute deve estar entre :min e :max caracteres.',
        'array' => ':attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => ':attribute deve ser verdadeiro ou falso.',
    'confirmed' => 'confirmação não confere para :attribute.',
    'current_password' => 'Senha incorreta.',
    'date' => ':attribute não é uma data válida.',
    'date_equals' => ':attribute deve ser uma data igual a :date.',
    'date_format' => ':attribute não está no formato :format.',
    'declined' => ':attribute deve ser recusado.',
    'declined_if' => ':attribute deve ser recusado quando :other for :value.',
    'different' => ':attribute e :other devem ser diferentes.',
    'digits' => ':attribute deve ter :digits dígitos.',
    'digits_between' => ':attribute deve estar entre :min e :max dígitos.',
    'dimensions' => ':attribute tem dimensões inválidas de imagem.',
    'distinct' => 'o campo :attribute tem um valor duplicado.',
    'email' => ':attribute deve ser um endereço de email válido.',
    'ends_with' => ':attribute deve terminar com um dos seguintes valores: :values.',
    'enum' => 'o selecionado :attribute é inválido.',
    'exists' => 'o selecionado :attribute é inválido.',
    'file' => ':attribute deve ser um arquivo.',
    'filled' => 'o campo :attribute deve ter um valor.',
    'gt' => [
        'numeric' => ':attribute deve ser maior que :value.',
        'file' => ':attribute deve ser maior que :value kilobytes.',
        'string' => ':attribute deve ter mais que :value caracteres.',
        'array' => ':attribute deve ter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => ':attribute deve ser maior ou igual a :value.',
        'file' => ':attribute deve ser maior ou igual a :value kilobytes.',
        'string' => ':attribute deve ser maior ou igual a :value caracteres.',
        'array' => ':attribute deve ter :value itens ou mais.',
    ],
    'image' => ':attribute deve ser uma imagem.',
    'in' => 'o selecionado :attribute é inválido.',
    'in_array' => 'o campo :attribute não existe em :other.',
    'integer' => ':attribute deve ser um número inteiro.',
    'ip' => ':attribute deve ser um endereço de IP válido.',
    'ipv4' => ':attribute deve ser um endereço de IPv4 válido.',
    'ipv6' => ':attribute deve ser um endereço de IPv6 válido.',
    'json' => ':attribute deve ser um JSON em forma de texto válido.',
    'lt' => [
        'numeric' => ':attribute deve ter menos que :value.',
        'file' => ':attribute deve ter menos que :value kilobytes.',
        'string' => ':attribute deve ter menos que :value caracteres.',
        'array' => ':attribute deve ter menos que :value itens.',
    ],
    'lte' => [
        'numeric' => ':attribute deve ser menor ou igual a :value.',
        'file' => ':attribute deve ser menos ou igual a :value kilobytes.',
        'string' => ':attribute deve ser menor ou igual a :value caracteres.',
        'array' => ':attribute não deve ter mais que :value itens.',
    ],
    'mac_address' => ':attribute deve ser um endereço de MAC válido.',
    'max' => [
        'numeric' => ':attribute não deve ser maior que :max.',
        'file' => ':attribute não deve ser maior que :max kilobytes.',
        'string' => ':attribute não deve ser maior que :max caracteres.',
        'array' => ':attribute não deve ter mais que :max itens.',
    ],
    'mimes' => ':attribute deve ser um arquivo com os seguintes formatos: :values.',
    'mimetypes' => ':attribute deve ser um arquivo com os seguintes formatos: :values.',
    'min' => [
        'numeric' => ':attribute deve ser no mínimo :min.',
        'file' => ':attribute deve ter no mínimo :min kilobytes.',
        'string' => ':attribute deve ter no mínimo :min caracteres.',
        'array' => ':attribute deve ter no mínimo :min itens.',
    ],
    'multiple_of' => ':attribute deve ser um múltiplo de :value.',
    'not_in' => 'o selecionado :attribute é inválido.',
    'not_regex' => 'o formato de :attribute é inválido.',
    'numeric' => ':attribute deve ser um número.',
    'password' => 'senha incorreta.',
    'present' => 'o campo :attribute deve estar presente.',
    'prohibited' => 'o campo :attribute é proibido.',
    'prohibited_if' => 'o campo :attribute é proibido quando :other é :value.',
    'prohibited_unless' => 'o campo :attribute é proibido ao menos que :other esteja em :values.',
    'prohibits' => 'o campo :attribute proíbe :other de estar presente.',
    'regex' => 'o formado de :attribute é inválido.',
    'required' => 'o campo :attribute é obrigatório.',
    'required_array_keys' => 'o campo :attribute deve conter entradas para: :values.',
    'required_if' => 'o campo :attribute é obrigatório quando :other é :value.',
    'required_unless' => 'o campo :attribute é obrigatório a menos que :other esteja em :values.',
    'required_with' => 'o campo :attribute é obrigatório quando :values estão presentes.',
    'required_with_all' => 'o campo :attribute é obrigatório quando :values estão presentes.',
    'required_without' => 'o campo :attribute é obrigatório quando :values não estão presentes.',
    'required_without_all' => 'o campo :attribute é obrigatório quando nenhum dos :values estão presentes.',
    'same' => ':attribute e :other devem combinar.',
    'size' => [
        'numeric' => ':attribute deve ter :size.',
        'file' => ':attribute deve ter :size kilobytes.',
        'string' => ':attribute deve ter :size caracteres.',
        'array' => ':attribute deve conter :size itens.',
    ],
    'starts_with' => ':attribute deve começar com um dos seguintes valores: :values.',
    'string' => ':attribute deve ser um texto.',
    'timezone' => ':attribute deve ser um fuso horário válido.',
    'unique' => 'este(a) :attribute já consta no sistema.',
    'uploaded' => ':attribute falhou ao carregar.',
    'url' => ':attribute deve ser uma URL válida.',
    'uuid' => ':attribute deve ser um UUID válido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
