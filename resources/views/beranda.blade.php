@extends('components.layout')

@section('content')

<!-- hero section -->
<div class="flex justify-center items-center h-screen relative">
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Data to enrich your online business</h1>
        <p class="mt-8 text-lg font-medium text-gray-500 sm:text-xl">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">Get started</a>
            <a href="#" class="text-sm font-semibold text-gray-900">Learn more <span aria-hidden="true">→</span></a>
        </div>
    </div>
</div>


<!-- Produk Section -->
<section id="produk" class="py-20">
  <div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        
        <!-- Card Produk dengan Alpine.js -->
        <div x-data="{ showModal: false }" class="group relative border rounded-md p-4 shadow-sm hover:shadow-lg transition">

          <!-- Gambar Produk -->
          <img src="https://tailwindui.com/plus-assets/img/ecommerce-images/product-page-01-related-product-01.jpg" 
               alt="Basic Tee" 
               class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75">

          <!-- Informasi Produk -->
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">Basic Tee</h3>
              <p class="mt-1 text-sm text-gray-500">Black</p>
            </div>
            <p class="text-sm font-medium text-gray-900">$35</p>
          </div>

          <!-- Button untuk menampilkan modal -->
          <button @click="showModal = true" class="mt-4 w-full bg-indigo-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-indigo-500 transition">
            Detail
          </button>

          <!-- Modal Detail Produk -->
          <div x-show="showModal" x-cloak class="fixed inset-0 z-10 w-screen overflow-y-auto bg-gray-500/75 flex items-center justify-center">
            <div class="relative bg-white py-10 px-6 w-full max-w-2xl rounded-lg shadow-lg">
              <button @click="showModal = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Close</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
              </button>

              <div class="grid grid-cols-1 sm:grid-cols-12 gap-6">
                <img src="https://tailwindui.com/plus-assets/img/ecommerce-images/product-quick-preview-02-detail.jpg" 
                     alt="Basic Tee" 
                     class="aspect-2/3 w-full rounded-lg bg-gray-100 sm:col-span-4">
                <div class="sm:col-span-8">
                  <h2 class="text-2xl font-bold text-gray-900">Basic Tee 6-Pack</h2>
                  <p class="text-2xl text-gray-900 mt-2">$192</p>
                  <p class="mt-4 text-gray-600">This is a high-quality basic tee perfect for daily wear.</p>
                  <!-- Sizes -->
                  <fieldset class="mt-10" aria-label="Choose a size">
                    <div class="flex items-center justify-between">
                      <div class="text-sm font-medium text-gray-900">Size</div>
                      <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
                    </div>

                    <div class="mt-4 grid grid-cols-4 gap-4">
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium text-gray-900 uppercase shadow-xs hover:bg-gray-50 focus:outline-hidden sm:flex-1">
                        <input type="radio" name="size-choice" value="XXS" class="sr-only">
                        <span>XXS</span>
                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                      </label>
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium text-gray-900 uppercase shadow-xs hover:bg-gray-50 focus:outline-hidden sm:flex-1">
                        <input type="radio" name="size-choice" value="XS" class="sr-only">
                        <span>XS</span>
                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                      </label>
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium text-gray-900 uppercase shadow-xs hover:bg-gray-50 focus:outline-hidden sm:flex-1">
                        <input type="radio" name="size-choice" value="S" class="sr-only">
                        <span>S</span>
                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                      </label>
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium text-gray-900 uppercase shadow-xs hover:bg-gray-50 focus:outline-hidden sm:flex-1">
                        <input type="radio" name="size-choice" value="M" class="sr-only">
                        <span>M</span>
                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                      </label>
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium text-gray-900 uppercase shadow-xs hover:bg-gray-50 focus:outline-hidden sm:flex-1">
                        <input type="radio" name="size-choice" value="L" class="sr-only">
                        <span>L</span>
                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                      </label>
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium text-gray-900 uppercase shadow-xs hover:bg-gray-50 focus:outline-hidden sm:flex-1">
                        <input type="radio" name="size-choice" value="XL" class="sr-only">
                        <span>XL</span>
                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                      </label>
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium text-gray-900 uppercase shadow-xs hover:bg-gray-50 focus:outline-hidden sm:flex-1">
                        <input type="radio" name="size-choice" value="XXL" class="sr-only">
                        <span>XXL</span>
                        <!--
                          Active: "border", Not Active: "border-2"
                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                        -->
                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                      </label>
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative flex cursor-not-allowed items-center justify-center rounded-md border bg-gray-50 px-4 py-3 text-sm font-medium text-gray-200 uppercase hover:bg-gray-50 focus:outline-hidden sm:flex-1">
                        <input type="radio" name="size-choice" value="XXXL" disabled class="sr-only">
                        <span>XXXL</span>
                        <span aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                          <svg class="absolute inset-0 size-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                            <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                          </svg>
                        </span>
                      </label>
                    </div>
                  </fieldset>
                  <button type="submit" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden">Add to bag</button>
                </div>
              </div>
            </div>
          </div>

        </div> <!-- End Card -->

      </div>
    </div>
  </div>
</section>



@endsection
