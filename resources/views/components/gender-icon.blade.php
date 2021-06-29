@switch($gender)
    @case('male')
        <i class="fas fa-mars text-blue-300"></i>
        @break
    @case('female')
        <i class="fas fa-venus text-pink-300"></i>
        @break
    @case('transgender')
        <i class="fas fa-transgender text-yellow-300"></i>
        @break
    @default
        <i class="fas fa-genderless text-gray-300"></i>
@endswitch
