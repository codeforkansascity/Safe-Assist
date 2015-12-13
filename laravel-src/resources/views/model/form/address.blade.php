<div class="address">
	<div class="form_row">
		<div class="label">Street Address</div> 
		<input type="text" name="street" value="{{ $address->street }}"></input>
	</div>
	<div class="form_row">
		<div class="label">City</div> 
		<input type="text" name="street" value="{{ $address->city }}"></input>
	</div>
	<div class="form_row">
		<div class="label">State</div> 
		<select name="state">
		@foreach (array('AL', 'AK', 'AS', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FM', 'FL', 'GA', 'GU', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VI', 'VA', 'WA', 'WV', 'WI', 'WY', 'AE', 'AA', 'AP') as $state)
			<option {{ $state==$address->state ? "SELECTED" : ""}} value="{{$state}}">{{$state}}</option>
		@endforeach
		</select>
	</div>
	<div class="form_row">
		<div class="label">Zip</div>
		<input type="text" name="zip1" value="{{ $address->zip1 }}"></input>
		<input type="text" name="zip2" value="{{ $address->zip2 }}"></input>
	</div>
</div>
