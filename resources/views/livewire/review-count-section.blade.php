<div class="pl-2" title="Overall Review Point - {{$r = round($reviews->avg('review_point'))}}">
    @for($i = 1 ; $i<=$r; $i++)
        <span class="mr-1 review-star"><i class="fa fa-star"></i></span>
    @endfor

    @for($j = $i ; $j<=5; $j++)
        <span class="mr-1"><i class="fa fa-star-o"></i></span>
    @endfor
    <span class="ml-5">{{$reviews->count()}} Reviews</span>
</div>
