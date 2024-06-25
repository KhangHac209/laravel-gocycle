@extends('client.layout.master')

@section('content')
    <div class="contact">
        <iframe class="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.286794657034!2d106.69998057485708!3d10.789332489360246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b52bdeeced%3A0xa98faf7dce7d7a12!2zMzEvMiBOZ3V54buFbiBC4buJbmggS2hpw6ptLCDEkGEgS2FvLCBRdeG6rW4gMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1711110609673!5m2!1svi!2s"
            width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="section-title">
                        <h2>Contact Info</h2>
                    </div>
                    <p>
                        At Go Cycle, we strongly believe that your online bike shop should be the hub for your everyday
                        bicycling needs. Your local authorized Go Cycle retailer should be able to
                        provide the best services for you and your bicycle.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="info">
                        <h3>Tp.Ho Chi Minh</h3>
                        <p>31/2 Nguyen Binh Khiem, P.Dakao, Q.1</p>
                        <p>(+84) 708-240-602</p>
                        <p>khangvo20p@gmail.com</p>
                    </div>
                </div>
                {{--
            <div class="col-lg-6 col-md-6">
                <form action="{{ route('send.message') }}" method="POST">
                    @csrf
                    <div class="section-title">
                        <h2>Get In Touch</h2>
                    </div>
                    <div class="name">
                        <input name="last_name" type="text" placeholder="Your Name" required>
                        <input name="email" type="email" placeholder="Your Email" required>
                    </div>
                    <textarea name="note" type="text" placeholder="Your Message" required></textarea>
                    <button class="send" type="submit">Send Message</button>
                </form>
            </div>
            --}}
            </div>
        </div>
    </div>
@endsection
