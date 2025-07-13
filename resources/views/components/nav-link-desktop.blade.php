@props(['active'=> false])

<a  {{ $attributes->merge([
        'class' => ($active
            ? 'bg-gray-900 dark:bg-gray-300 dark:text-black text-white'
            : 'text-gray-300 hover:bg-blue-700 hover:text-white dark:text-blue-200 dark:hover:bg-blue-600 dark:hover:text-white'
        ) . ' block rounded-md px-3 py-2 text-base font-medium transition'
    ]) }} aria-current="{{ $active ? 'page':'false'}}">{{$slot}}</a>