<!-- Modal -->
<div class="modal fade review-container" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 header container-fluid" id="exampleModalLabel">Reviews -
                    {{$car->brand->name}} {{$car->make}} {{$car->model}}
                </h1>
            </div>
            <div class="modal-body">
                @if(count($car->reviews)>0)
                @foreach ($car->reviews as $review)
                <div class="border-bottom mb-3">
                    <span class="font-weight-bold">{{$review->user->first_name}}
                        {{$review->user->last_name}}</span>
                    <div class="pl-2">{{$review->comment}}</div>
                </div>
                @endforeach
                @else
                <p>No Reviews</p>
                @endif

                <div>
                    @if(!auth()->check())
                    <a href="/login">Log in</a> to give review
                    @else
                    <form action="/cars/{{$car->id}}" method="post">
                        @csrf
                        <textarea type="text" name="review" class="form-control"
                            placeholder="Your Review" required></textarea>
                        <button type="submit"
                            class="btn btn-primary mt-2 comment-button">Comment</button>
                    </form>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-button"
                    data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>