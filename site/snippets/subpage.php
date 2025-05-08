<section 
      id="subpage" 
      x-transition.opacity.duration.500ms 
      x-show="subpage !== 'home'" 
      class="w-full absolute z-40 top-0 left-0 min-h-[calc(100vh-96px)]  bg-opacity-95 pb-20 sm:pb-0"

>
      <div class="overflow-y-scroll" x-show="subpage && subpage.length > 0" x-html="subpagedata" ></div>
</section>