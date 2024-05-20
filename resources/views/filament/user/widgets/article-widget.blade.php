<x-filament-widgets::widget>
  <h2 class="text-xl font-bold">
    Recent Articles
  </h2>

  <x-filament::section style="margin-top: 2rem">
    <a href="{{ route('filament.user.pages..articles.{article}', 'binge-eating-disorder') }}" style="display: block">
      <h3 class="text-2xl font-bold">Binge Eating Disorder</h3>
      <p class="text-sm" style="margin-top: .5rem">
        Binge Eating Disorder (BED) has been discussed as a disordered eating behavior since the 1950’s but was not
        officially recognized as its own diagnosis until the Diagnostic and Statistical Manual of Mental Disorders
        published its 5th Edition (DSM-5) in 2013. Even so, this is not an indicator of the severity or prevalence of
        BED throughout history. In fact, BED disorder is the most common eating disorder in the United States,
        therefore, awareness of signs, symptoms, and treatment interventions is important.....
      </p>
    </a>
    <hr style="margin-top: 2rem">
    <a href="{{ route('filament.user.pages..articles.{article}', 'anorexia-nervosa') }}"
      style="margin-top: 2rem; display: block">
      <h3 class="text-2xl font-bold">Anorexia Nervosa</h3>
      <p class="text-sm" style="margin-top: .5rem">
        Women or men who struggle with anorexia nervosa will usually have an obsessive fear of gaining weight, refusal
        to maintain a healthy body weight, and an unrealistic perception of body image. Many individuals with anorexia
        will severely limit the quantity of food they consume and perceive themselves as overweight, even when they may
        be clearly underweight.....
      </p>
    </a>
    <hr style="margin-top: 2rem">
    <a href="{{ route('filament.user.pages..articles.{article}', 'bulimia-nervosa') }}"
      style="margin-top: 2rem; display: block">
      <h3 class="text-2xl font-bold">Bulimia Nervosa</h3>
      <p class="text-sm" style="margin-top: .5rem">
        This eating disorder is characterized by repeated binge eating followed by behaviors that compensate for the
        overeating, such as forced vomiting, excessive exercise, or inappropriate use of laxatives or diuretics. Men and
        women who suffer with Bulimia may fear weight gain and feel severely unhappy with their body size and shape....
      </p>
    </a>
  </x-filament::section>
</x-filament-widgets::widget>
