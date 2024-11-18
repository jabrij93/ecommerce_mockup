@php
$role = Auth::user()-> role ?? null
@endphp

<x-app-layout>
    <!-- Display flash message -->
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif  
                
    <div class="product-wrapper"> 
        <section class="product">
            <div class="product__photo">
                <a href="/sales" class="back-link">
                    <i class="material-icons back-icon" href="/sales">arrow_back</i>
                </a>
                    <div class="photo-container">
                        <div class="photo-main">
                            <div class="controls">
                                <i class="material-icons">share</i>
                                <i class="material-icons">favorite_border</i>
                            </div>
                            <img src="{{ asset('storage/item_images/' . $item->images) }}" alt="Item Image">
                            <!-- <img src="https://res.cloudinary.com/john-mantas/image/upload/v1537291846/codepen/delicious-apples/green-apple-with-slice.png" alt="green apple slice"> -->
                        </div>
                        <div class="photo-album">
                            <ul>
                                <li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302064/codepen/delicious-apples/green-apple2.png" alt="green apple"></li>
                                <li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537303532/codepen/delicious-apples/half-apple.png" alt="half apple"></li>
                                <li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537303160/codepen/delicious-apples/green-apple-flipped.png" alt="green apple"></li>
                                <li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537303708/codepen/delicious-apples/apple-top.png" alt="apple top"></li>
                            </ul>
                        </div>
                    </div>
            </div>

            
            <div class="product__info">
                <div class="title">
                    <h1> {{ $item->name }} </h1>
                    <h1> {{ $item->itemType->types }} </h1>
                    Product ID: <span>{{ $item->product_id }} </span>
                </div>
                <div class="price">
                    RM <span> {{ $item->price }}</span>
                </div>
                <div class="variant">
                    <h3>SELECT A COLOR</h3>
                    <ul>
                        <li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302064/codepen/delicious-apples/green-apple2.png" alt="green apple"></li>
                        <li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302752/codepen/delicious-apples/yellow-apple.png" alt="yellow apple"></li>
                        <li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302427/codepen/delicious-apples/orange-apple.png" alt="orange apple"></li>
                        <li><img src="https://res.cloudinary.com/john-mantas/image/upload/v1537302285/codepen/delicious-apples/red-apple.png" alt="red apple"></li>
                    </ul>
                </div>
                <div class="description">
                    <h3>DESCRIPTION</h3>
                    <ul>
                        <li>Apples are nutricious</li>
                        <li>Apples may be good for weight loss</li>
                        <li>Apples may be good for bone health</li>
                        <li>They're linked to a lowest risk of diabetes</li>
                    </ul>
                </div>
                <form action="/add_to_cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                    <button class="buy--btn">ADD TO CART</button>
                </form>
            </div>
        </section>
    </div>    

    <footer>
        <p>Design from <a href="https://dribbble.com/shots/5216438-Daily-UI-012">dribbble shot</a> of <a href="https://dribbble.com/rodrigorramos">Rodrigo Ramos</a></p>
    </footer>
</x-app-layout>