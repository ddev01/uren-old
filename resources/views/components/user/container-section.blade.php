<div{{ $attributes->except('class') }} {{ $attributes->merge(['class' => 'rounded-lg bg-white p-8 shadow-primary dark:bg-gray-800']) }}>
	{{ $slot }}
	</div>
