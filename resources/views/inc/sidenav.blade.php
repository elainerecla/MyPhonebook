{{--Navbar--}}
<div class="col-sm-2">
    <nav class="nav flex-column nav-pills">
        <a href="#" class="nav-link"><img src="/images/mydevice.png" alt="phone"> My Device</a>
        <nav class="nav flex-column nav-pills">
            <a href="/contacts/{{$currentauth->id}}" class="nav-link ml-4 active"><img src="/images/contacts.png" alt="phone"> Contacts</a>
            <a href="#" class="nav-link ml-4"><img src="/images/messaging.png" alt="message"> Messaging</a>
        </nav>
    </nav>
</div>
{{--End Navbar--}}