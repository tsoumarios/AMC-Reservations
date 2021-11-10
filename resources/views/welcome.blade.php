
<x-guest-layout>

	@if (Route::has('login'))

		@auth
		<x-jet-authentication-card>
			<x-slot name="logo">
				<x-jet-authentication-card-logo />
			</x-slot>
			<a href="{{ url('/home') }}" class="text-sm text-gray-700 home-button">Home</a>
			<h3>You are already logged in!</h3>
		</x-jet-authentication-card>
	@else

		<x-jet-authentication-card>
	
			
			<x-slot name="logo">
				<x-jet-authentication-card-logo />
				<hr class="horline" />
				<div class="message-wr">
					<h1 class="main-message">WELCOME TO AMC</h1>
				</div>
				<hr class="horline" />
				<span class="secondary_message ml-2 text-sm text-gray-600">Sign in and join hundreds of shops within your area.</span>
				<span class="signup-text ml-2 text-sm text-gray-600">Don't have an account?</span>
                <x-jet-button class="switch-button ml-4">
									{{ __('Register') }}
						</x-jet-button>
					<!-- <div class="signup-buttons">
						<i class="fab fa-google"></i>
						<i class="fab fa-facebook"></i>
					</div> -->
			</x-slot>

			<x-jet-validation-errors class="mb-4" />

			@if (session('status'))
				<div class="mb-4 font-medium text-sm text-green-600">
					{{ session('status') }}
				</div>
			@endif

			<div class="forms">

				<div class="login-wr leftc">
					<form method="POST" class="show" id="login_form" action="{{ route('login') }}">
						@csrf
						<h3 class="form-title">Login</h3>
						
						<div>
							<x-jet-label for="email" value="{{ __('Email') }}" />
							<x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
						</div>
		
						<div class="mt-4">
							<x-jet-label for="password" value="{{ __('Password') }}" />
							<x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
						</div>
		
						<div class="block mt-4">
							<label for="remember_me" class="flex items-center">
								<input type = "checkbox" id="remember_me" class = "checkbox-login rounded" name="remember">
								<span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
							</label>
						</div>
		
						<div class="flex items-center justify-end" style="margin-top: 50px;">
							@if (Route::has('password.request'))
								<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
									{{ __('Forgot your password?') }}
								</a>
							@endif
		
							<x-jet-button class="ml-4 login-button">
								{{ __('Submit') }}
							</x-jet-button>
						</div>
					</form>
					
				</div>

				<div class="register-wr leftc">
					<form method="POST" class="hide" id="register_form" action="{{ route('register') }}">
						@csrf
						<h3 class="form-title">Register</h3>
			
						<div>
							<x-jet-label for="name" value="Full name" />
							<x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
						</div>
				
						<div>
							<x-jet-label for="phone_num" value="Phone number" />
							<x-jet-input id="phone_num" class="block mt-1 w-full" type="number" name="phone_num" :value="old('phone_num')" required autofocus  placeholder="+30" />
						</div>
			
						<div class="mt-4">
							<x-jet-label for="email" value="{{ __('Email') }}" />
							<x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
						</div>
			
						<div class="mt-4">
							<x-jet-label for="password" value="{{ __('Password') }}" />
							<x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
						</div>
			
						<div class="mt-4">
							<x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
							<x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
						</div>
						@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
							<div class="mt-4">
								<x-jet-label for="terms">
									<div class="flex items-center">
									<label for="terms" class="flex items-center">
									<input type = "checkbox" id="terms" class = "checkbox-login rounded" name="terms">
									</label>
			
										<div class="ml-2">
											{!! __('I agree to the :terms_of_service and :privacy_policy', [
													'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
													'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
											]) !!}
										</div>
									</div>
								</x-jet-label>
							</div>
						@endif
			
						<div class="flex items-center justify-end mt-4">
							<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
								{{ __('Already registered?') }}
							</a>
			
							<x-jet-button class="ml-4 login-button">
								{{ __('Submit') }}
							</x-jet-button>
						</div>
					</form>
				</div>
			</div>
		</x-jet-authentication-card>

		@endauth
	@endif
</x-guest-layout>

