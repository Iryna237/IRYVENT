<form action="{{ route('checkout') }}" method="POST">
    @csrf
    <input type="hidden" name="amount" value="6000">
    <input type="hidden" name="currency" value="XAF">
    <input type="hidden" name="email" value="iryna@gmail.com">
    <input type="hidden" name="order_id" value="{{ $order_id ?? '' }}">
    
    <button type="submit" class="mt-6 bg-green-600 text-white px-6 py-3 rounded-xl cursor-pointer hover:bg-green-700 hover:scale-105 transition duration-300 w-full font-bold flex justify-center items-center gap-3">
        <i data-lucide="credit-card" class="w-5 h-5"></i>
        Payer maintenant
    </button>
</form>
