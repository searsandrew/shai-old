@props(['disabled' => false, 'selection' => ''])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
    <option value="unfilled" @if($selection == 'unfilled') selected  @endif>Unfilled</option>
    <option value="filled" @if($selection == 'filled') selected  @endif>Filled</option>
    <option value="completed" @if($selection == 'completed') selected  @endif>Completed</option>
    <option value="retracted" @if($selection == 'retracted') selected  @endif>Retracted</option>
</select>