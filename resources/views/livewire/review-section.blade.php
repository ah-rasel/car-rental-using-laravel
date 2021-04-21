<div class="d-flex flex-column comment-section">
    <h5  >All Reviews </h5>
    @foreach($reviews as $review)
        <div>
            <div class="bg-white p-2">
                <div class="d-flex flex-row user-info">
                    <img class="rounded-circle" src="{{asset('userFiles/assets/img/boy%20with%20mask.png')}}" width="40">
                    <div class="d-flex flex-column justify-content-start ml-2">
                          <span class="d-block font-weight-bold name">{{$review->user->name}}
                          <span class="float-right ml-5">Rating : {{$review->review_point}}
                          <i class="fa fa-star ml-2 review-star"></i></span></span>
                        <span class="date text-black-50">Shared publicly On - {{$review->created_at->format('d M Y')}} ,at {{$review->created_at->format('h:i A')}}</span>
                    </div>
                </div>
                <div class="mt-2">
                    <p class="comment-text pl-5 text-justify">
                        {{$review->review_text}}
                    </p>
                </div>
            </div>
        </div>
    @endforeach

    @auth

        <div class="bg-light p-2 mb-5">

            <form wire:submit.prevent="addReview" action="" type="POST">
                <div class="d-flex flex-row align-items-start">
                    <img class="rounded-circle" src="{{asset('userFiles/assets/img/boy%20with%20mask.png')}}" width="40">
                    <textarea wire:model.defer="review_text" class="form-control ml-1 shadow-none textarea" rows="2" cols="100" placeholder="Your Review...">
                    </textarea>
                </div>
                @error('review_text')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div wire:model.defer="review_value" class="mt-2 text-right">
                    <div >
                        <span class="float-left mr-4">
                            <input class="float-left mt-1 mr-1" type="radio" name="review_value" value="1"  id="{{ $var1 = rand() }}"><label class="float-left" for="{{ $var1 }}">1</label>
                        </span>

                        <span class="float-left mr-4">
                            <input class="float-left mt-1 mr-1" type="radio" name="review_value" value="2" id="{{ $var1 = rand() }}"><label class="float-left" for="{{ $var1 }}">2</label>
                        </span>
                        <span class="float-left mr-4">
                            <input class="float-left mt-1 mr-1" type="radio"  name="review_value" value="3" id="{{ $var1 = rand() }}"><label class="float-left" for="{{ $var1 }}">3</label>
                        </span>
                        <span class="float-left mr-4">
                            <input class="float-left mt-1 mr-1" type="radio"  name="review_value" value="4" id="{{ $var1 = rand() }}"><label class="float-left" for="{{ $var1 }}">4</label>
                        </span>
                        <span class="float-left mr-4">
                            <input class="float-left mt-1 mr-1" type="radio"  name="review_value" value="5" id="{{ $var1 = rand() }}"><label class="float-left" for="{{ $var1 }}">5</label>
                        </span>
                    </div>
                    <button class="btn btn-primary btn-sm shadow-none" type="submit">Post Review</button>
                    </br>
                    @error('review_value')
                    <p class="float-left text-danger">{{$message}}</p>
                    @enderror
                </div>
            </form>

        </div>
    @else


        <div class="bg-light p-2 mb-5">
            <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="{{asset('userFiles/assets/img/boy%20with%20mask.png')}}" width="40"><textarea class="form-control ml-1 shadow-none textarea" placeholder="Your Review..." disabled="" readonly=""></textarea></div>
            <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none disabled" type="button">Please Login to Post Review<i class="fa fa-lock ml-3"></i></button></div>
        </div>

    @endauth

</div>
