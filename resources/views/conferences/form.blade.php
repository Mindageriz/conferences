<div class="mb-3">
    <label for="title" class="form-label">{{__('messages.conference.fields.title')}}</label>
    <input type="text" name="title" id="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{old('title', optional($conference)->title)}}" required
    >
    @error('title')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">{{__('messages.conference.fields.description')}}</label>
    <textarea name="description" id="description" rows="4"
        class="form-control @error('description') is-invalid @enderror" required
    >{{old('description', optional($conference)->description)}}</textarea>
    @error('description')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="date" class="form-label">{{__('messages.conference.fields.date')}}</label>
        <input type="date" name="date" id="date"
            class="form-control @error('date') is-invalid @enderror"
            value="{{old('date', optional($conference->date ?? null)->format('Y-m-d'))}}" required
        >
        @error('date')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label for="city" class="form-label">{{__('messages.conference.fields.city')}}</label>
        <input type="text" name="city" id="city"
            class="form-control @error('city') is-invalid @enderror"
            value="{{old('city', optional($conference)->city)}}" required
        >
        @error('city')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label for="country" class="form-label">{{__('messages.conference.fields.country')}}</label>
        <input type="text" name="country" id="country"
            class="form-control @error('country') is-invalid @enderror"
            value="{{old('country', optional($conference)->country)}}" required
        >
        @error('country')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="mb-3">
    <label for="address" class="form-label">{{__('messages.conference.fields.address')}}</label>
    <input type="text" name="address" id="address"
        class="form-control @error('address') is-invalid @enderror"
        value="{{old('address', optional($conference)->address)}}" required
    >
    @error('address')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="participantCount" class="form-label">{{__('messages.conference.fields.participants')}}</label>
    <input type="number" name="participantCount" id="participantCount"
        class="form-control @error('participantCount') is-invalid @enderror"
        value="{{old('participantCount', optional($conference)->participantCount)}}" min="0" required
    >
    @error('participantCount')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
