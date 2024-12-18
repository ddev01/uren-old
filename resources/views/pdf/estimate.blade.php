@extends('layouts.pdf')
{{-- inline styles --}}
@section('styles')
	<style type="text/css">
		div.h1 {
			font-size: 24pt;
			margin-bottom: 10pt;
		}

		.ooompa {
			font-size: 24pt;
			margin-bottom: 10pt;
		}

		div.h4 {
			font-size: 12pt;
			margin-bottom: 5pt;
		}

		table {
			width: 100%;
		}

		th {
			text-align: left;
		}

		table.bordered tr td {
			border: 0.01pt solid #A6A6A6;
			padding: 6pt 8pt 6pt 8pt;
			vertical-align: top;
		}

		.spacer-row {
			height: 10pt;
			/* background: #f0f0f0; */
		}

		td.w-type {
			width: 55pt;
		}

		td.w-hours {
			width: 55pt;
		}

		.center {
			text-align: center;
		}

		.fw-bold {
			font-weight: bold;
		}

		.mb-4 {
			margin-bottom: 15pt;
		}

		.bg-light {
			background-color: #f0f0f0;
		}

		.page_break {
			page-break-before: always;
		}

		.gray {
			color: gray;
		}

		table.bordered td {
			vertical-align: top;
		}

		.information td {
			vertical-align: bottom;
		}

		#header a {
			color: #FFF;
			text-decoration: none;
		}

		* {
			font-family: Verdana, Arial, sans-serif;
		}
	</style>
@endsection
<div class="information" id="header">
	<table width="100%">
		<h1>Urenschatting</h1>

		<tr>
			<td style="width: 40%; line-height: 175%;" align="left">
				<div>
					<div>{{ __('Name') }}: {{ $estimate->name }}</div>
					<div>{{ __('Created by') }}: {{ $estimate->user->name }}</div>
					<div>Email: <a href="mailto:{{ $estimate->user->email }}">{{ $estimate->user->email }}</a></div>
					<div>{{ __('Date') }}: {{ $estimate->created_at->format('d-m-Y') }}</div>
				</div>
			</td>
			<td align="center">
				<img class="logo" src="{{ Auth::user()->getAvatar() }}" alt="Logo" style="" width="64" />
			</td>
			<td style="width: 40%; line-height: 175%;" align="right">
				<div>
					{{ __('Hourly rate') }}: {{ $estimate->hourly_rate }}
				</div>

			</td>
		</tr>

	</table>
</div>
@section('content')
	{{-- <div class="h1">{{ __('Urenschatting') }}</div> --}}
	<table class="bordered mb-4">
		<tr>
			<td class="bg-light fw-bold w-type">
				{{ __('Per jaar') }}
			</td>
			<td class="bg-light fw-bold w-hours">
				{{ __('Hours') }}
			</td>
			<td class="bg-light fw-bold">
				{{ __('Title') }}
			</td>
			<td class="bg-light fw-bold">
				{{ __('Description') }}
			</td>
			@if ($estimate->show_notes)
				<td class="bg-light fw-bold">
					{{ __('notes') }}
				</td>
			@endif
		</tr>
		@foreach ($estimate->sections as $section)
			<tr>
				<td class="spacer-row" colspan="5"></td>
			</tr>
			<tr>
				<td class="bg-light fw-bold w-type"></td>
				<td class="bg-light fw-bold w-hours">
					{{ $section->defaultHours() }}
				</td>
				<td class="bg-light fw-bold">{{ $section->name }}</td>
				<td class="bg-light fw-bold">{{ $section->description }}</td>
				@if ($estimate->show_notes)
					<td class="bg-light fw-bold">{{ $section->note }}</td>
				@endif
			</tr>
			@foreach ($section->rows as $row)
				<tr>
					<td class="w-type">{{ $row->type }}</td>
					<td class="w-hours">{{ $row->formatted_hours }}</td>
					<td>{{ $row->name }}</td>
					<td>{{ $row->description }}</td>
					@if ($estimate->show_notes)
						<td>{{ $row->note }}</td>
					@endif
				</tr>
			@endforeach
		@endforeach
	</table>
	<table class="bordered mb-4">
		<tr class="bg-light fw-bold">
			<td class="w-type">
				{{ __('Type') }}
			</td>
			<td class="w-hours">
				{{ __('Value') }}
			</td>
			<td>
				{{ __('Total') }}
			</td>
		</tr>
		@foreach ($totals as $type => $total)
			<tr>
				<td class="w-type">{{ $type }}</td>
				<td class="w-hours">{{ $total['value'] }}</td>
				<td>{{ $total['sum'] }}</td>
			</tr>
		@endforeach
	</table>
@endsection
