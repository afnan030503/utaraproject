<template>
  <div class="min-h-screen bg-stone-50">
    <nav :class="[
      'fixed w-full z-50 transition-all duration-300',
      scrolled ? 'bg-white shadow-md py-4' : 'bg-transparent py-6'
    ]">
      <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
        <Link href="/" class="flex items-center gap-3">
          <div :class="[
            'text-2xl font-bold transition-colors',
            scrolled ? 'text-emerald-800' : 'text-white'
          ]">
            <span class="border-2 rounded px-2 py-1">北</span>
            <span class="ml-2">UTARA</span>
          </div>
        </Link>

        <ul :class="[
          'hidden md:flex items-center gap-8 font-medium transition-colors',
          scrolled ? 'text-gray-700' : 'text-white'
        ]">
          <li><a href="#home" class="hover:text-emerald-600 transition">Home</a></li>
          <li><Link href="/menu" class="hover:text-emerald-600 transition">Menu</Link></li>
          <li><a href="#about" class="hover:text-emerald-600 transition">About</a></li>
          <li><a href="#location" class="hover:text-emerald-600 transition">Location</a></li>
        </ul>

        <div class="flex gap-3">
          <Link href="/login" class="bg-blue-500 text-white px-5 py-2 rounded-full hover:bg-blue-600 transition font-medium">
            Login
          </Link>
          <button class="bg-emerald-600 text-white px-5 py-2 rounded-full hover:bg-emerald-700 transition font-medium">
            Order Now
          </button>
        </div>
      </div>
    </nav>

    <section id="home" class="relative h-screen overflow-hidden">
      <div
        ref="bannerScroll"
        class="flex h-full overflow-x-auto snap-x snap-mandatory scroll-smooth"
        style="scrollbar-width: none; -ms-overflow-style: none;"
        @scroll="handleBannerScroll"
      >
        <div class="min-w-full h-full snap-center relative flex-shrink-0">
          <img
            src="/public/Banner1.jpg"
            alt="Banner 1"
            class="w-full h-full object-cover"
            loading="lazy"
          />
          <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/60" />
          <div class="absolute inset-0 flex items-center justify-center text-center text-white px-6">
            <div class="max-w-4xl">
              <h1 class="text-6xl md:text-7xl font-bold mb-6">
                Welcome to Utara
              </h1>
              <p class="text-xl md:text-2xl mb-8">
                Our Cafe
              </p>
              <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition transform hover:scale-105">
                Explore Menu
              </button>
            </div>
          </div>
        </div>

        <div class="min-w-full h-full snap-center relative flex-shrink-0">
          <img
            src="/public/Banner2.jpg"
            alt="Banner 2"
            class="w-full h-full object-cover"
            loading="lazy"
          />
          <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/60" />
          <div class="absolute inset-0 flex items-center justify-center text-center text-white px-6">
            <div class="max-w-4xl">
              <h1 class="text-6xl md:text-7xl font-bold mb-6">
                Artisan Coffee
              </h1>
              <p class="text-xl md:text-2xl mb-8">
                Crafted with Passion
              </p>
              <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition transform hover:scale-105">
                Order Now
              </button>
            </div>
          </div>
        </div>

        <div class="min-w-full h-full snap-center relative flex-shrink-0">
          <img
            src="/public/Banner3.jpg"
            alt="Banner 3"
            class="w-full h-full object-cover"
            loading="lazy"
          />
          <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/60" />
          <div class="absolute inset-0 flex items-center justify-center text-center text-white px-6">
            <div class="max-w-4xl">
              <h1 class="text-6xl md:text-7xl font-bold mb-6">
                Cozy Atmosphere
              </h1>
              <p class="text-xl md:text-2xl mb-8">
                Your Second Home
              </p>
              <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition transform hover:scale-105">
                Visit Us
              </button>
            </div>
          </div>
        </div>
      </div>

      <button
        @click="scrollToPrev"
        class="absolute left-6 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white p-3 rounded-full transition z-10"
      >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button
        @click="scrollToNext"
        class="absolute right-6 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white p-3 rounded-full transition z-10"
      >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>

      <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2 z-10">
        <button
          v-for="index in 3"
          :key="index"
          @click="scrollToSlide(index - 1)"
          :class="[
            'h-2 rounded-full transition-all',
            currentBannerIndex === index - 1 ? 'bg-white w-8' : 'bg-white/50 w-2'
          ]"
        />
      </div>
    </section>

    <section id="menu-grid" class="py-16 md:py-20 bg-gray-100">
      <div class="max-w-7xl mx-auto px-4">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

          <div class="relative bg-white shadow-xl overflow-hidden"> 
            <img
              src="/public/burger.jpg" 
              alt="Burger besar dengan keju dan sayuran"
              class="w-full h-[250px] md:h-[300px] object-cover"
              loading="lazy"
            />
            <div class="p-3 bg-white"> 
              <div class="flex items-center gap-2">
                <span class="text-black font-bold bg-green-400 px-3 py-1 rounded text-sm whitespace-nowrap">
                  24K
                </span>
                <p class="text-gray-700 text-sm md:text-base">
                  Crispy fish fillet with sauce and fresh veggies on a soft bun.
                </p>
              </div>
            </div>
          </div>

          <div class="bg-custom-blue rounded-lg p-6 shadow-xl text-white">
            <div class="flex flex-wrap gap-2 font-semibold text-sm md:text-base mb-4">
              <button class="px-3 py-1 bg-white text-black rounded shadow font-bold">Burger</button>
              <button class="hover:text-black">Super Big</button>
              <button class="hover:text-black">Meals</button>
              <button class="hover:text-black">Snack & Side</button>
            </div>
            
            <div class="grid grid-cols-2 gap-y-3 text-sm md:text-base mt-6 font-medium">
              <div class="space-y-3 pr-4">
                <p class="menu-item-blue pb-1">Kopi Susu Gula Aren</p>
                <p class="menu-item-blue pb-1">Kopi Susu Butterscotch</p>
              </div>
              <div class="space-y-3">
                <p class="menu-item-blue pb-1">Kopi Susu Salted Caramel</p>
                </div>
            </div>
          </div>

          <div class="bg-custom-green rounded-lg p-6 shadow-xl text-gray-800">
            <div class="flex flex-wrap gap-4 font-bold text-sm md:text-base mb-4">
              <button class="px-3 py-1 bg-white text-black rounded shadow font-bold">Kopi Susu</button>
              <button class="hover:text-white">Espresso Based</button>
              <button class="hover:text-white">Americano Series</button>
              <button class="hover:text-white">Non Cofffee</button>
            </div>
            
            <div class="grid grid-cols-2 gap-y-3 text-sm md:text-base mb-6 font-medium">
              <div class="space-y-3">
                    <p class="menu-item-green pb-1">Tea and Refreshment</p>
                    <p class="menu-item-green pb-1">Manual Brew</p>
              </div>
              <div></div> 
            </div>

            <div class="grid grid-cols-2 gap-x-4 gap-y-3 text-sm md:text-base font-medium">
              <div class="space-y-3 pr-4">
                <p class="menu-item-green pb-1">Kopi Susu Gula Aren</p>
                <p class="menu-item-green pb-1">Kopi Susu Butterscotch</p>
                <p class="menu-item-green pb-1">Kopi Susu Caramel</p>
              </div>
              <div class="space-y-3">
                <p class="menu-item-green pb-1">Kopi Susu Salted Caramel</p>
                <p class="menu-item-green pb-1">Kopi Susu Almond</p>
              </div>
            </div>
          </div>

          <div class="relative bg-white shadow-xl overflow-hidden"> 
            <img
              src="/public/burger.jpg" 
              alt="Minuman kopi lemon"
              class="w-full h-[250px] md:h-[300px] object-cover"
              loading="lazy"
            />
            <div class="p-3 bg-white"> 
              <div class="flex items-center gap-2">
                <span class="text-white font-bold bg-blue-600 px-3 py-1 rounded text-sm whitespace-nowrap">
                  24K
                </span>
                <p class="text-gray-700 text-sm md:text-base">
                  Crispy fish fillet with sauce and fresh veggies on a soft bun.
                </p>
              </div>
            </div>
          </div>

        </div>
        
        <hr class="mt-8 mb-6 border-t border-gray-300">

        <div class="text-center">
          <p class="text-black mb-4 font-semibold text-sm md:text-base">Online ordering available at</p>
          <div class="flex justify-center flex-wrap gap-4">
            <a href="#" class="bg-white border border-gray-200 text-black font-bold px-4 py-2 rounded-lg shadow-md hover:opacity-90 transition flex items-center gap-2">
              <img src="/public/gofood-logo.png" alt="Gofood Logo" class="h-4 w-4"> gofood
            </a>
            <a href="#" class="bg-white border border-gray-200 text-black font-bold px-4 py-2 rounded-lg shadow-md hover:opacity-90 transition flex items-center gap-2">
              <img src="/public/grabfood-logo.png" alt="GrabFood Logo" class="h-4 w-4"> GrabFood
            </a>
            <a href="#" class="bg-white border border-gray-200 text-black font-bold px-4 py-2 rounded-lg shadow-md hover:opacity-90 transition flex items-center gap-2">
              <img src="/public/shopeefood-logo.png" alt="ShopeeFood Logo" class="h-4 w-4"> ShopeeFood
            </a>
          </div>
        </div>

      </div>
    </section>

    <section id="menu" class="py-20 bg-stone-50">
      <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-5xl font-bold text-gray-900 mb-4">Our Menu</h2>
          <p class="text-gray-600 text-lg">Discover our signature drinks and delicious treats</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <div
            v-for="(category, index) in menuCategories"
            :key="index"
            class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2"
          >
            <div class="relative h-64 overflow-hidden">
              <img
                :src="category.image"
                :alt="category.title"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent" />
              <h3 class="absolute bottom-4 left-4 text-3xl font-bold text-white">
                {{ category.title }}
              </h3>
            </div>
            <div class="p-6">
              <ul class="space-y-2 mb-6">
                <li v-for="(item, idx) in category.items" :key="idx" class="text-gray-600 flex items-center gap-2">
                  <span class="w-1.5 h-1.5 bg-emerald-600 rounded-full" />
                  {{ item }}
                </li>
              </ul>
              <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-lg font-semibold transition">
                View All
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="location" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-5xl font-bold text-gray-900 mb-4">Visit Us</h2>
          <p class="text-gray-600 text-lg">Find our coffee shop and experience the Utara difference</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
          <div class="bg-stone-50 rounded-2xl p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Get in Touch</h3>
            <div class="space-y-4">
              <div class="flex items-start gap-4">
                <div class="bg-emerald-100 p-3 rounded-lg">
                  <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900 mb-1">Address</h4>
                  <p class="text-gray-600">Jl. Coffee Street No. 123<br />Jakarta, Indonesia</p>
                </div>
              </div>

              <div class="flex items-start gap-4">
                <div class="bg-emerald-100 p-3 rounded-lg">
                  <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900 mb-1">Phone</h4>
                  <p class="text-gray-600">+62 812-3456-7890</p>
                </div>
              </div>

              <div class="flex items-start gap-4">
                <div class="bg-emerald-100 p-3 rounded-lg">
                  <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900 mb-1">Email</h4>
                  <p class="text-gray-600">hello@utara.coffee</p>
                </div>
              </div>
            </div>

            <div class="mt-8">
              <h4 class="font-semibold text-gray-900 mb-4">Opening Hours</h4>
              <div class="space-y-2 text-gray-600">
                <div class="flex justify-between">
                  <span>Monday - Friday</span>
                  <span class="font-semibold">07:00 - 22:00</span>
                </div>
                <div class="flex justify-between">
                  <span>Saturday - Sunday</span>
                  <span class="font-semibold">08:00 - 23:00</span>
                </div>
              </div>
            </div>
          </div>

          <div class="rounded-2xl overflow-hidden shadow-lg h-96">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666666666666!2d106.816666!3d-6.200000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMDAuMCJTIDEwNsKwNDknMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
              width="100%"
              height="100%"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
            />
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-gray-900 text-white py-12">
      <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
          <div>
            <div class="flex items-center gap-2 mb-4">
              <span class="text-2xl font-bold border-2 rounded px-2 py-1">北</span>
              <span class="text-2xl font-bold">UTARA</span>
            </div>
            <p class="text-gray-400">
              Premium Indonesian Coffee Experience
            </p>
          </div>

          <div>
            <h4 class="font-semibold mb-4">Quick Links</h4>
            <ul class="space-y-2 text-gray-400">
              <li><a href="#home" class="hover:text-emerald-400 transition">Home</a></li>
              <li><Link href="/menu" class="hover:text-emerald-400 transition">Menu</Link></li>
              <li><a href="#about" class="hover:text-emerald-400 transition">About</a></li>
              <li><a href="#location" class="hover:text-emerald-400 transition">Location</a></li>
            </ul>
          </div>

          <div>
            <h4 class="font-semibold mb-4">Legal</h4>
            <ul class="space-y-2 text-gray-400">
              <li><a href="#" class="hover:text-emerald-400 transition">Privacy Policy</a></li>
              <li><a href="#" class="hover:text-emerald-400 transition">Terms of Service</a></li>
              <li><a href="#" class="hover:text-emerald-400 transition">Contact</a></li>
            </ul>
          </div>

          <div>
            <h4 class="font-semibold mb-4">Follow Us</h4>
            <div class="flex gap-3">
              <a href="#" class="bg-gray-800 hover:bg-emerald-600 p-3 rounded-full transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </a>
              <a href="#" class="bg-gray-800 hover:bg-emerald-600 p-3 rounded-full transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM12 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zM18.406 5.975c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
              </a>
              <a href="#" class="bg-gray-800 hover:bg-emerald-600 p-3 rounded-full transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
              </a>
            </div>
          </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
          <p>© 2025 Utara Coffee. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
// Jika Anda menggunakan <script setup>, kode ini perlu diubah sedikit.
// Namun, jika Anda menggunakan format Options API, ini adalah kode yang benar.
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue';
import { Link } from '@inertiajs/vue3';

// Definisikan komponen menggunakan Options API (sesuai format kode Anda)
export default {
  name: 'Home',
  components: { Link },
  
  data() {
    return {
      scrolled: false,
      currentBannerIndex: 1,
      menuCategories: [
        { title: 'Coffee', image: 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=600&h=600&fit=crop', items: ['Espresso', 'Cappuccino', 'Latte', 'Americano'] },
        { title: 'Non-Coffee', image: 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=600&h=600&fit=crop', items: ['Matcha Latte', 'Chocolate', 'Tea', 'Fresh Juice'] },
        { title: 'Food', image: 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=600&h=600&fit=crop', items: ['Croissant', 'Sandwich', 'Cake', 'Pastries'] }
      ]
    };
  },

  mounted() {
    window.addEventListener('scroll', this.handleScroll);
    this.$nextTick(() => {
      // Scroll ke banner tengah (Banner2) saat pertama kali load
      const container = this.$refs.bannerScroll;
      if (container) {
        container.scrollLeft = container.offsetWidth; // Scroll ke slide kedua (index 1)
        this.currentBannerIndex = 1;
      }
    });
  },

  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },

  methods: {
    handleScroll() {
      this.scrolled = window.scrollY > 50;
    },

    handleBannerScroll() {
      const container = this.$refs.bannerScroll;
      if (container) {
        const scrollLeft = container.scrollLeft;
        const width = container.offsetWidth;
        // Hitung indeks yang dibulatkan ke bilangan bulat terdekat
        const index = Math.round(scrollLeft / width);
        this.currentBannerIndex = index;
      }
    },

    scrollToNext() {
      const container = this.$refs.bannerScroll;
      if (container) {
        // Hanya scroll jika belum di slide terakhir (index 2)
        if (this.currentBannerIndex < 2) {
          container.scrollLeft += container.offsetWidth;
        }
      }
    },

    scrollToPrev() {
      const container = this.$refs.bannerScroll;
      if (container) {
        // Hanya scroll jika belum di slide pertama (index 0)
        if (this.currentBannerIndex > 0) {
          container.scrollLeft -= container.offsetWidth;
        }
      }
    },

    scrollToSlide(index) {
      const container = this.$refs.bannerScroll;
      if (container) {
        container.scrollLeft = index * container.offsetWidth;
      }
    }
  }
};
</script>

<style scoped>
/* Hide scrollbar */
.overflow-x-auto::-webkit-scrollbar {
  display: none;
}

@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* KODE CSS KUSTOM UNTUK MENU BARU */
.bg-custom-blue {
    background-color: #5bb3e3;
}
.bg-custom-green {
    background-color: #61df9e;
}
.menu-item-blue {
    color: #e5e7eb;
    border-bottom: 1px dashed rgba(255, 255, 255, 0.5); 
}
.menu-item-green {
    color: #1f2937;
    border-bottom: 1px dashed rgba(0, 0, 0, 0.2); 
}

/* Tambahkan ini jika Anda ingin scroll halus di dalam browser */
html {
  scroll-behavior: smooth;
}
</style>