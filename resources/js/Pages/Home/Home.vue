<template>
  <div class="min-h-screen bg-stone-50 flex flex-col">
    <nav :class="[
        'fixed w-full z-50 transition-all duration-300',
        // Perubahan: py-4 saat scrolled diganti py-6 untuk memberi ruang bagi logo yang lebih besar
        scrolled ? 'bg-white shadow-md py-1' : 'bg-transparent py-8' // py-8 juga ditingkatkan sedikit
    ]">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
      <Link href="/" class="flex items-center gap-3">
        <img 
            src="/public/utara.jpg" 
            alt="Logo Utara" 
            :class="[
                'h-20 transition-opacity', scrolled ? 'opacity-100' : 'opacity-90' 
            ]"
        />
        </Link>

        <ul :class="[
          'hidden md:flex items-center gap-8 font-medium transition-colors',
          scrolled ? 'text-gray-700' : 'text-white'
        ]">
          <li><a href="#home" class="hover:text-emerald-600 transition">Home</a></li>
          <li><a href="#menu" class="hover:text-emerald-600 transition">Menu</a></li>
          <li><a href="#promo" :class="[
            'transition',
            scrolled ? 'text-gray-700 hover:text-emerald-600' : 'text-white hover:text-emerald-600'
          ]">Promo & Loyalty</a></li>
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
          />
          <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/60" />
          <div class="absolute inset-0 flex items-center justify-center text-center text-white px-6">
            <div class="max-w-4xl">
              <h1 class="text-6xl md:text-7xl font-bold mb-6">
                Welcome to Utara
              </h1>
              <p class="text-xl md:text-2xl mb-8">
                Experience the Perfect Blend
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
    
    <section id="menu" class="py-0 pt-0 bg-white flex flex-col min-h-screen">
      
      <div class="flex-1 grid md:grid-cols-2 gap-0 w-full">
        
        <div 
          class="flex flex-col h-full overflow-y-auto px-8 py-6 bg-blue-500 text-white border-r border-blue-600"
        >
          
          <div class="flex space-x-3 border-b border-white/50 pb-4 mb-4 overflow-x-auto whitespace-nowrap">
            <button
              v-for="cat in categories"
              :key="cat.id"
              @click="selectCategory(cat.id)"
              :class="[
                'flex-shrink-0 px-5 py-2 rounded-lg font-semibold transition text-base',
                // Warna disesuaikan untuk latar belakang biru gelap
                selectedCategory === cat.id
                  ? 'bg-blue-300 text-blue-900 shadow'
                  : 'text-white/80 hover:bg-white/30'
              ]"
            >
              {{ cat.name }}
            </button>
          </div>

          <div class="flex space-x-3 border-b border-white/50 pb-4 mb-4 overflow-x-auto whitespace-nowrap">
            <button
              v-for="sub in selectedCategoryData.subcategories"
              :key="sub.id"
              @click="selectSubcategory(sub.id)"
              :class="[
                'flex-shrink-0 px-4 py-1 rounded-md text-base font-semibold transition',
                // Warna disesuaikan untuk latar belakang biru gelap
                selectedSubcategory === sub.id
                  ? 'bg-white text-blue-800 shadow' 
                  : 'text-white/80 hover:bg-white/30'
              ]"
            >
              {{ sub.name }}
            </button>
          </div>
          
          <div class="flex-1">
            <div v-if="filteredMenus.length === 0" class="text-center text-white/70 mt-8">
              No menu available.
            </div>
            <div v-else class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2">
              <div
                v-for="menu in filteredMenus"
                :key="menu.id"
                @click="selectMenu(menu)"
                :class="[
                  'py-3 px-2 cursor-pointer rounded transition font-medium flex items-center justify-between',
                  // Item aktif
                  selectedMenu?.id === menu.id
                    ? 'bg-blue-300 text-blue-900 font-semibold shadow border-l-4 border-blue-600'
                    : 'hover:bg-blue-400 text-white'
                ]"
              >
                <span class="truncate">{{ menu.name }}</span>
                <span class="text-sm font-bold text-white">{{ formatPrice(menu.price) }}</span>
              </div>
            </div>
          </div>
        </div>

        <div class="relative bg-white flex items-start justify-center overflow-hidden">
          <div class="w-full pt-[100%] relative">
            <template v-if="selectedMenu">
              <img
                v-if="selectedMenu.image"
                :src="selectedMenu.image"
                :alt="selectedMenu.name"
                class="object-cover w-full h-full absolute top-0 left-0"
                style="max-width:none;"
                loading="lazy"
              />
              <div v-else class="flex items-center justify-center w-full h-full bg-blue-100 absolute top-0 left-0">
                <svg class="w-40 h-40 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-1-5a1 1 0 100-2 1 1 0 000 2z" />
                </svg>
              </div>

              <div
                class="absolute bottom-8 left-8 bg-black bg-opacity-60 text-white px-6 py-3 rounded-lg max-w-xs transition-opacity duration-300"
                style="backdrop-filter: blur(6px);"
              >
                <div class="text-2xl font-bold">{{ formatPrice(selectedMenu.price) }}</div>
                <div class="text-lg font-medium mt-1">{{ selectedMenu.name }}</div>
                <div class="text-sm mt-1">{{ selectedMenu.description }}</div>
              </div>
            </template>
            <template v-else>
              <div class="text-gray-400 text-xl text-center italic p-12 absolute top-0 left-0 w-full h-full flex items-center justify-center">
                Select a menu to see the detail & image
              </div>
            </template>
          </div>
        </div>
      </div>
    </section>

    <section id="promo" class="pt-20 pb-16 bg-gradient-to-br from-red-600 to-orange-600 text-white">
      <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-4">Promotions & Loyalty</h1>
        <p class="text-xl text-orange-100">Grab the latest deals and rewards!</p>
      </div>
    </section>

    <section class="py-16 bg-stone-50">
      <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-bold text-gray-900 mb-8 text-center">Active Promotions</h2>

        <div v-if="promos.length > 0" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div
            v-for="promo in promos"
            :key="promo.id"
            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2"
          >
            <div class="relative h-64 bg-gradient-to-br from-red-500 to-orange-500 overflow-hidden">
              <img
                v-if="promo.image"
                :src="promo.image"
                :alt="promo.title"
                class="w-full h-full object-cover"
              />
              <div class="absolute top-4 right-4 bg-yellow-400 text-gray-900 px-4 py-2 rounded-full font-bold text-sm">
                LIMITED!
              </div>
            </div>

            <div class="p-6">
              <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ promo.title }}</h3>
              <p class="text-gray-600 mb-4">{{ promo.description }}</p>

              <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                <span>Valid until: {{ formatDate(promo.end_date) }}</span>
              </div>

              <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-lg font-semibold transition">
                Claim Now
              </button>
            </div>
          </div>
        </div>

        <div v-else class="text-center py-16">
          <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
          </svg>
          <h3 class="text-2xl font-bold text-gray-900 mb-2">No Active Promotions</h3>
          <p class="text-gray-600">Check back soon for exciting deals!</p>
        </div>
      </div>
    </section>
    <section class="py-16 bg-gray-900 text-white">
      <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-8">Order Online & Get Discount!</h2>
        <div class="flex flex-wrap justify-center gap-8 items-center">
          <div class="bg-white rounded-xl p-6 hover:shadow-2xl transition transform hover:scale-105">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9f/Gofood_logo.png" alt="GoFood" class="h-12" />
            <p class="text-gray-900 font-bold mt-2">Diskon s.d 110K</p>
          </div>
          <div class="bg-white rounded-xl p-6 hover:shadow-2xl transition transform hover:scale-105">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/GrabFood_logo.svg/2560px-GrabFood_logo.svg.png" alt="GrabFood" class="h-12" />
            <p class="text-gray-900 font-bold mt-2">Cashback 50%</p>
          </div>
          <div class="bg-white rounded-xl p-6 hover:shadow-2xl transition transform hover:scale-105">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6f/ShopeeFood_logo.png" alt="ShopeeFood" class="h-12" />
            <p class="text-gray-900 font-bold mt-2">Gratis Ongkir</p>
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="py-20 bg-emerald-50">
      <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div class="grid grid-cols-2 gap-4">
            <img
              src="https://images.unsplash.com/photo-1511920170033-f8396924c348?w=600&h=600&fit=crop"
              alt="Coffee"
              class="rounded-2xl shadow-lg w-full h-64 object-cover"
            />
            <img
              src="https://images.unsplash.com/photo-1442512595331-e89e73853f31?w=600&h=600&fit=crop"
              alt="Brewing"
              class="rounded-2xl shadow-lg w-full h-64 object-cover mt-8"
            />
          </div>
          <div>
            <h2 class="text-5xl font-bold text-gray-900 mb-6">
              From Customer to Friend
            </h2>
            <p class="text-gray-600 text-lg mb-4 leading-relaxed">
              Utara is more than just a coffee shop. We are a community space where coffee lovers gather to enjoy premium Indonesian coffee, crafted with passion and precision.
            </p>
            <p class="text-gray-600 text-lg mb-6 leading-relaxed">
              Our beans are carefully sourced from the finest coffee plantations across Indonesia, roasted to perfection, and brewed by our expert baristas.
            </p>
            <Link href="/about" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-full font-semibold transition">
              Learn More About Us
            </Link>
          </div>
        </div>
      </div>
    </section>

    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-5xl font-bold text-gray-900 mb-4">Galeri Komunitas</h2>
          <p class="text-gray-600 text-lg">Meet our wonderful community members</p>
        </div>

        <div class="mb-16">
          <h3 class="text-3xl font-bold text-gray-900 mb-8">Sambat</h3>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-sky-400 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:scale-105">
              <img src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?w=400&h=400&fit=crop" alt="Community" class="w-full h-64 object-cover" />
              <div class="p-4 bg-white">
                <p class="font-semibold text-gray-900">#Skripshit</p>
              </div>
            </div>
            <div class="bg-sky-500 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:scale-105">
              <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop" alt="Community" class="w-full h-64 object-cover" />
              <div class="p-4 bg-white">
                <p class="font-semibold text-gray-900">#CintaKandas</p>
              </div>
            </div>
            <div class="bg-green-400 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:scale-105">
              <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&h=400&fit=crop" alt="Community" class="w-full h-64 object-cover" />
              <div class="p-4 bg-white">
                <p class="font-semibold text-gray-900">#Sambat</p>
              </div>
            </div>
            <div class="bg-sky-400 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:scale-105">
              <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?w=400&h=400&fit=crop" alt="Community" class="w-full h-64 object-cover" />
              <div class="p-4 bg-white">
                <p class="font-semibold text-gray-900">#ganteng-gantengGay</p>
              </div>
            </div>
          </div>
        </div>

        <div>
          <h3 class="text-3xl font-bold text-gray-900 mb-8">Romansa</h3>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-sky-400 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:scale-105">
              <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=400&fit=crop" alt="Community" class="w-full h-64 object-cover" />
              <div class="p-4 bg-white">
                <p class="font-semibold text-gray-900">#Skripshit</p>
              </div>
            </div>
            <div class="bg-sky-500 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:scale-105">
              <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop" alt="Community" class="w-full h-64 object-cover" />
              <div class="p-4 bg-white">
                <p class="font-semibold text-gray-900">#CintaKandas</p>
              </div>
            </div>
            <div class="bg-green-400 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:scale-105">
              <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&h=400&fit=crop" alt="Community" class="w-full h-64 object-cover" />
              <div class="p-4 bg-white">
                <p class="font-semibold text-gray-900">#Sambat</p>
              </div>
            </div>
            <div class="bg-sky-400 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:scale-105">
              <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop" alt="Community" class="w-full h-64 object-cover" />
              <div class="p-4 bg-white">
                <p class="font-semibold text-gray-900">#ganteng-gantengGay</p>
              </div>
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
            <p class="text-gray-400">Premium Indonesian Coffee Experience</p>
          </div>

          <div>
            <h4 class="font-semibold mb-4">Quick Links</h4>
            <ul class="space-y-2 text-gray-400">
              <li><a href="#home" class="hover:text-emerald-400 transition">Home</a></li>
              <li><a href="#menu" class="hover:text-emerald-400 transition">Menu</a></li>
              <li><a href="#promo" class="hover:text-emerald-400 transition">Promo & Loyalty</a></li>
              <li><a href="#about" class="hover:text-emerald-400 transition">About</a></li>
              <li><a href="#location" class="hover:text-emerald-400 transition">Contact</a></li>
            </ul>
          </div>

          <div>
            <h4 class="font-semibold mb-4">Legal</h4>
            <ul class="space-y-2 text-gray-400">
              <li><a href="#" class="hover:text-emerald-400 transition">Privacy Policy</a></li>
              <li><a href="#" class="hover:text-emerald-400 transition">Terms of Service</a></li>
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
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM12 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
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

-<script>
import { Link } from '@inertiajs/vue3';

export default {
  name: 'HomeWithMenu',
  components: { Link },

  props: {
    promos: {
      type: Array,
      default: () => [
        // Data Promos
        { id: 1, title: 'Diskon 50% untuk Kopi Baru', description: 'Nikmati kopi spesial terbaru kami dengan setengah harga di hari kerja pertama Anda.', image: 'https://images.unsplash.com/photo-1541167760496-1628856ab22d?w=400&h=400&fit=crop', end_date: '2025-12-31' },
        { id: 2, title: 'Beli 1 Gratis 1 Makanan Ringan', description: 'Setiap pembelian hidangan utama, dapatkan satu makanan ringan gratis. Sempurna untuk berbagi!', image: 'https://images.unsplash.com/photo-1543362174-8903061266e7?w=400&h=400&fit=crop', end_date: '2025-11-30' },
        { id: 3, title: 'Happy Hour: Diskon 20%', description: 'Diskon 20% untuk semua minuman dari jam 3 sore sampai 5 sore.', image: 'https://images.unsplash.com/photo-1549488330-8d5916053f3e?w=400&h=400&fit=crop', end_date: '2025-12-15' },
      ]
    }
  },

  data() {
    return {
      scrolled: false,
      currentBannerIndex: 0,
      
      // PERBAIKAN: Struktur Data Menu disesuaikan menjadi Foods & Drinks.
      categories: [
        {
          id: 10, name: 'Foods', subcategories: [ // Category Utama: Foods
            { id: 11, name: 'Burger', menus: [ // Subcategory: Burger (sebelumnya 'All')
              { id: 101, name: 'Ocean Burger', price: 28000, description: 'Crispy fish fillet with sauce and fresh veggies on a soft bun', image: 'burger.jpg' },
              { id: 102, name: 'Firebird Burger', price: 24000, description: 'Fried chicken, coleslaw, and smoked mayo in a bold, fiery burger', image: 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?w=600' },
              { id: 103, name: 'Northern Burger', price: 32000, description: 'Grilled beef patty, fresh coleslaw, and smoked mayo in a bold, fiery burger', image: 'https://images.unsplash.com/photo-1543779508-211fa9e2a43b?w=600' },
            ] },
            { id: 12, name: 'Super Big', menus: [ // Subcategory: Super Big
               // PERBAIKAN ID: Diperlukan ID unik
               { id: 104, name: 'Ocean Burger Double Party', price: 36000, description: 'Double fish patty, double the flavor—stacked with sauce and greens' },
               { id: 105, name: 'Northern Burger Double Party', price: 44000 },
               { id: 106, name: 'Firebird Burger Double Party', price: 30000 },
            ] },
            { id: 13, name: 'Snacks & Sides', menus: [ // Subcategory: Snacks & Sides
               // PERBAIKAN ID: Diperlukan ID unik
               { id: 107, name: 'Wedge Wonders', price: 18000 },
               { id: 108, name: 'Crunchy Rings', price: 18000 },
               { id: 109, name: 'Golden Corn', price: 16000 },
            ] }
          ]
        },
        {
          id: 20, name: 'Drinks', subcategories: [ // Category Utama: Drinks
            { id: 21, name: 'Kopi Susu', menus: [ // Subcategory
              { id: 201, name: 'Kopi Susu Gula Aren', price: 28000, description: 'Coffee with palm sugar and fresh milk.', image: 'https://images.unsplash.com/photo-1511920170033-f8396924c348?w=600' },
              { id: 202, name: 'Kopi Susu Salted Caramel', price: 32000, description: 'Coffee with caramel and a hint of salt.', image: 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600' },
              { id: 203, name: 'Kopi Susu Butterscotch', price: 32000, description: 'Coffee with butterscotch and milk.', image: 'https://images.unsplash.com/photo-1442512595331-e89e73853f31?w=600' },
              { id: 204, name: 'Kopi Susu Almond', price: 32000, description: 'Coffee with almond and fresh milk.', image: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=600' },
              { id: 205, name: 'Kopi Susu Caramel', price: 28000, description: 'Caramel coffee with milk.', image: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=600' }
            ] },
            { id: 31, name: 'Espresso Based', menus: [ // Subcategory
              { id: 300, name: 'Cappuccino', price: 25000, description: 'Classic hot cappuccino with rich espresso and steamed milk.' },
              { id: 301, name: 'Latte', price: 25000, description: 'Smooth and milky hot latte.' },
              { id: 302, name: 'Dirty Latte', price: 25000, description: 'Cold latte with a shot of espresso on top.' },
              { id: 303, name: 'Spanish Latte', price: 28000, description: 'Iced latte sweetened with condensed milk.' }
            ] },
             { id: 41, name: 'Americano Series', menus: [ /* Tambahkan menu Americano dari seeder */ ] }, // Subcategory
             { id: 51, name: 'Non-Coffee', menus: [ /* Tambahkan menu Non-Coffee dari seeder */ ] } // Subcategory
          ]
        },
      ],
      selectedCategory: null,
      selectedSubcategory: null,
      selectedMenu: null,
    };
  },

  computed: {
    selectedCategoryData() {
      return this.categories.find(cat => cat.id === this.selectedCategory) || { subcategories: [] };
    },
    // PERBAIKAN: Fungsi ini sudah benar, mencari subcategory dari category yang aktif.
    selectedSubcategoryData() {
      return this.selectedCategoryData.subcategories.find(sub => sub.id === this.selectedSubcategory) || { menus: [] };
    },
    filteredMenus() {
      return this.selectedSubcategoryData.menus;
    }
  },

  mounted() {
    window.addEventListener('scroll', this.handleScroll);
    
    // PERBAIKAN INISIALISASI: Memastikan data ada sebelum memanggil selectCategory.
    if (this.categories.length) {
      this.selectCategory(this.categories[0].id);
    }
  },

  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },

  methods: {
    handleScroll() {
      this.scrolled = window.scrollY > 50;
    },

    formatDate(date) {
      return new Date(date).toLocaleDateString('id-ID', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      });
    },

    // Metode Banner Carousel (Dibiarkan sama)
    handleBannerScroll() {
        // ... (Logika handleBannerScroll Anda)
    },
    scrollToSlide() {
        // ... (Logika scrollToSlide Anda)
    },
    scrollToNext() {
        // ... (Logika scrollToNext Anda)
    },
    scrollToPrev() {
        // ... (Logika scrollToPrev Anda)
    },


    // Metode untuk Menu Interaktif
    selectCategory(id) {
      this.selectedCategory = id;
      const subs = this.selectedCategoryData.subcategories || [];
      
      // PENTING: Jika category berubah, pilih subcategory pertama dari category baru.
      this.selectedSubcategory = subs[0]?.id || null;
      
      // Pilih menu pertama dari subcategory yang baru dipilih.
      const selectedSubcatData = this.selectedCategoryData.subcategories.find(sub => sub.id === this.selectedSubcategory) || { menus: [] };
      this.selectedMenu = selectedSubcatData.menus[0] || null;
    },

    selectSubcategory(id) {
      this.selectedSubcategory = id;
      // Pilih menu pertama dari subcategory baru
      this.selectedMenu = this.filteredMenus[0] || null;
    },

    selectMenu(menu) {
      this.selectedMenu = menu;
    },

    // PERBAIKAN: Menggunakan toLocaleString untuk format Rupiah standar
    formatPrice(price) {
      if (typeof price === 'number' && price > 0) {
        return price.toLocaleString('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 0,
        });
      }
      return 'N/A';
    },
  }
};
</script>