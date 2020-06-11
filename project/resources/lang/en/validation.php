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

		'accepted'             => 'The :attribute must be accepted.',
		'active_url'           => 'The :attribute is not a valid URL.',
		'after'                => 'The :attribute must be a date after :date.',
		'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
		'alpha'                => 'The :attribute may only contain letters.',
		'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
		'alpha_num'            => 'The :attribute may only contain letters and numbers.',
		'array'                => 'The :attribute must be an array.',
		'before'               => 'The :attribute must be a date before :date.',
		'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
		'between'              => [
			'numeric' => 'The :attribute must be between :min and :max.',
			'file'    => 'The :attribute must be between :min and :max kilobytes.',
			'string'  => 'The :attribute must be between :min and :max characters.',
			'array'   => 'The :attribute must have between :min and :max items.',
		],
		'boolean'              => 'The :attribute field must be true or false.',
		'confirmed'            => 'De :attribute bevestiging komt niet overeen.',
		'date'                 => 'The :attribute is not a valid date.',
		'date_format'          => 'The :attribute does not match the format :format.',
		'different'            => 'The :attribute and :other must be different.',
		'digits'               => 'The :attribute must be :digits digits.',
		'digits_between'       => 'The :attribute must be between :min and :max digits.',
		'dimensions'           => 'The :attribute has invalid image dimensions.',
		'distinct'             => 'The :attribute field has a duplicate value.',
		'email'                => 'Het :attribute is geen geldig e-mailadres.',
		'exists'               => 'The selected :attribute is invalid.',
		'file'                 => 'The :attribute must be a file.',
		'filled'               => 'The :attribute field must have a value.',
		'image'                => 'The :attribute must be an image.',
		'in'                   => 'The selected :attribute is invalid.',
		'in_array'             => 'The :attribute field does not exist in :other.',
		'integer'              => 'Het :attribute veld moet een nummer zijn',
		'ip'                   => 'The :attribute must be a valid IP address.',
		'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
		'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
		'json'                 => 'The :attribute must be a valid JSON string.',
		'max'                  => [
			'numeric' => 'Het :attribute mag niet groter zijn dan :max.',
			'file'    => 'The :attribute may not be greater than :max kilobytes.',
			'string'  => 'Het :attribute mag niet groter zijn dan :max karakters.',
			'array'   => 'The :attribute may not have more than :max items.',
		],
		'mimes'                => 'The :attribute must be a file of type: :values.',
		'mimetypes'            => 'The :attribute must be a file of type: :values.',
		'min'                  => [
			'numeric' => 'Het :attribute mag niet kleiner zijn dan :min.',
			'file'    => 'The :attribute must be at least :min kilobytes.',
			'string'  => 'Het :attribute moet minstens :min karakters bevatten.',
			'array'   => 'The :attribute must have at least :min items.',
		],
		'not_in'               => 'The selected :attribute is invalid.',
		'numeric'              => 'Het :attribute veld moet een nummer zijn.',
		'present'              => 'The :attribute field must be present.',
		'regex'                => 'The :attribute format is invalid.',
		'required'             => 'Het :attribute veld is verplicht.',
		'required_if'          => 'Het :attribute veld is verplicht wanneer :other is :value.',
		'required_unless'      => 'The :attribute field is required unless :other is in :values.',
		'required_with'        => 'The :attribute field is required when :values is present.',
		'required_with_all'    => 'The :attribute field is required when :values is present.',
		'required_without'     => 'The :attribute field is required when :values is not present.',
		'required_without_all' => 'The :attribute field is required when none of :values are present.',
		'same'                 => 'Het :attribute en :other moeten hetzelfde zijn.',
		'size'                 => [
			'numeric' => 'Het :attribute moet :size zijn.',
			'file'    => 'Het :attribute mag niet groter zijn dan :size kilobytes.',
			'string'  => 'Het :attribute mag niet langer zijn dan :size karakters.',
			'array'   => 'The :attribute must contain :size items.',
		],
		'string'               => 'Het :attribute moet bestaan uit enkel letters.',
		'timezone'             => 'The :attribute must be a valid zone.',
		'unique'               => 'Het :attribute is al in gebruik.',
		'uploaded'             => 'The :attribute failed to upload.',
		'url'                  => 'The :attribute format is invalid.',

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
			'startdate' => [
				'after' =>'Je kan geen evenement in het verleden plaatsen.',
			],
			'enddate' => [
				'after' =>'Je kan geen evenement in het verleden plaatsen.',
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

		'attributes' => [
			'password' => 'wachtwoord',
			'street' => 'straat',
			'name' => 'naam',
			'first_name' => 'voornaam',
			'birthday' => 'verjaardag',
			'description' => 'beschrijving',
			'title' => 'titel',
			'zipcode' => 'postcode'
		],

	];
