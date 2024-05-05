@props([
    'name' => '',
    'id' => '',
    'label' => '',
    'options' => [],
    'campos' => '',
    'selected' => null,
])

<div class="w-[100%]">
    @if($label)
        <x-input-label for="{{ $id }}" :value="$label" />
    @endif

    <select class="w-[100%] mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            name="{{ $name }}"
            id="{{ $id }}" >
        
        @foreach($options as $option)
            @php
                switch ($campos) {
                    case 'CPF':
                        $valor = $option->nome;
                        break;
                    case 'CRM':
                        $valor = $option->nome . " - " . $option->especialidade->nome;
                        break;
                    default:
                        $valor = $option->codigo . " - " . $option->nome;
                        break;
                }
            @endphp
            
            <option value="{{ $option->id }}" {{ $option->id == $selected ? 'selected' : '' }}>
                {{ $valor }}
            </option>
        @endforeach
    </select>
</div>