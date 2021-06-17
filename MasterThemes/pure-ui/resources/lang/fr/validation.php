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

    'accepted' => ':attribute doit-être accepté.',
    'active_url' => ":attribute n'est pas une URL valide.",
    'after' => 'Le :attribute dois être une date après le :date ',
    'after_or_equal' => 'Le :attribut dois être une date supérieure ou égale au  :date. ',
    'alpha' => ':attribute doit uniquement contenir des lettres.',
    'alpha_dash' => ':attribute doit uniquement contenir des lettres, chiffres et tirets.',
    'alpha_num' => ':attribute doit uniquement contenir des lettres et chiffres.',
    'array' => 'Le :attribute dois être une tableau.',
    'before' => ':attribute doit être une date avant :date.',
    'before_or_equal' => 'Le :attribute dois être une date avant ou égale à :date.',
    'between' => [
        'array' => 'Le :attribute dois avoir entre :min et :max éléments. ',
        'file' => 'Le :attribute dois compris entre :min et :max kilobytes.',
        'numeric' => ':attribute doit être entre :min et :max.',
        'string' => 'Le :attribute dois être compris entre :min et :max caractères.',
    ],
    'boolean' => ':attribute doit être "true" (vrais) ou "false" (faux).',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'message personnalisé ',
        ],
    ],
    'date' => "Le :attribute n'est pas une date valide.",
    'date_format' => ':attribute ne correspond pas au format :format.',
    'different' => 'Le :attribute et :other doivent êtres différents. ',
    'digits' => 'Le :attribute dois comprendre :digits chiffres.',
    'digits_between' => 'Le :attribute dois  être compris entre :min et :max chiffres.',
    'dimensions' => "Le :attribute a une taille d'image invalide.",
    'distinct' => 'Le champs :attribute a une valeur en double.',
    'email' => "L':attribute doit être une adresse email valide.",
    'exists' => "L':attribute sélectionné: n'est pas valide.",
    'file' => 'Le :attribute dois être un fichier.',
    'filled' => 'Le champ :attribute est requis',
    'image' => 'Le :attribute dois être une image.',
    'in_array' => 'Le champ :attribute ne dois pas exister dans :other.',
    'integer' => "L':attribute doit être un entier.",
    'ip' => ':attribute doit être une IP valide.',
    'max' => [
        'array' => 'Le :attribute ne peuvent avoir plus de :max éléments ',
        'file' => ':attribute ne doit pas dépasser :max kilooctets.',
        'numeric' => ':attribute ne doit pas être supérieur à :max.',
        'string' => 'Le :attribute ne peut pas être supérieur à :max caractères.',
    ],
    'mimes' => 'Le :attribute dois être un fichier de type :values.',
    'mimetypes' => 'Le :attribute dois être un fichier de type :values.',
    'min' => [
        'array' => 'Le :attribute dois avoir au minimum :min éléments ',
        'file' => ":attribute doit être d'au moins :min kilooctets.",
        'numeric' => ":attribute doit être d'au moins :min.",
        'string' => 'Le :attribute dois avoir moins de :min caractères.',
    ],
    'not_in' => "Le :attribute sélectionné n'est pas valide.",
    'numeric' => 'Le :attribute dois être un nombre.',
    'present' => 'Le :attribute champ dois être remplis.',
    'regex' => 'Le format de ce :attribute est invalide.',
    'required' => 'Le champ :attribute est requis.',
    'required_if' => 'Le champ :attribute est requis quand :other est à :value.',
    'required_unless' => 'Le champ :attribute est obligatoire sauf si :other est dans :values.',
    'required_with' => "Le champ d':attribute est obligatoire quand les :values sont présentes.",
    'required_without_all' => "Lorsque :values n'est/ne sont pas présent(s), le champ :attribute est requis.",
    'required_without' => 'Le champ :attribute est obligatoire quand :values n’est pas présente.',
    'required_without_all' => 'Le champ :attribute est obligatoire si aucune des :values n’est présente.',
    'same' => ':attribute et :other doivent correspondres.',
    'size' => [
        'numeric' => ':attribute doit être de :size.',
        'file' => ':attribute doit faire :size kilooctets.',
        'string' => ':attribute doit avoir :size caractères.',
        'array' => 'Le :attribute dois contenir :size éléments.',
    ],
    'string' => ':attribute doit être une chaîne de caractère.',
    'timezone' => ':attribute doit être une zone valide.',

    'unique' => ':attribute a déjà été pris.',
    'uploaded' => "L':attribute n'a pas pu être téléchargé.",
    'url' => "Le format de l':attribute est invalide.",

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

    // Internal validation logic for Pterodactyl
    'internal' => [
        'variable_value' => ':env variable',
    ],
];
