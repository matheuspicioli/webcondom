<div class="radio">
	<label>
		<input type="radio" name="{{ $nome }}" value="{{ $valor ?? null }}" id="{{ $id }}" {{ old($nome) == $valor ? 'checked' : '' }} {{ $atributos ?? null }}>
			{{ $texto }}
	</label>
</div>