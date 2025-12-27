<x-layout.default>

    <div x-data="flowForm({{ json_encode($flow->steps->pluck('name')) }})">
        <div class="pt-5 grid grid-cols-12 lg:grid-cols-12">

            <div class="panel">

                <h3 class="text-lg font-bold mb-5">ویرایش فرآیند</h3>

                <form class="space-y-5"
                      method="POST"
                      action="{{ route('flows.update', $flow->id) }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name">نام فرآیند</label>
                        <input id="name"
                               name="name"
                               type="text"
                               class="form-input"
                               value="{{ old('name', $flow->name) }}"
                               required />
                        @error('name')
                        <span class="text-danger text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="description">توضیحات</label>
                        <textarea id="description"
                                  name="description"
                                  rows="3"
                                  class="form-textarea">{{ old('description', $flow->description) }}</textarea>
                        @error('description')
                        <span class="text-danger text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="slug">نوع فرآیند</label>
                        <select name="slug" id="slug" class="form-select" required>
                            <option value="" disabled>انتخاب کنید...</option>

                            <option value="transaction" {{ old('slug', $flow->slug) === 'transaction' ? 'selected' : '' }}>
                                معامله
                            </option>
                            <option value="sale" {{ old('slug', $flow->slug) === 'sale' ? 'selected' : '' }}>
                                فروش
                            </option>


                            <option value="customer-service" {{ old('slug', $flow->slug) === 'customer-service' ? 'selected' : '' }}>
                                خدمات مشتری
                            </option>
                        </select>

                        @error('slug')
                        <span class="text-danger text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label>مراحل فرآیند</label>
                        <template x-for="(step, index) in steps" :key="index">
                            <div class="flex items-center gap-2 mb-2">
                                <input type="text"
                                       :name="`steps[${index}]`"
                                       x-model="steps[index]"
                                       class="form-input text-sm p-2 flex-1"
                                       required
                                       placeholder="مرحله" />
                                <button type="button"
                                        class="btn btn-sm btn-outline-danger px-2 py-1 text-sm"
                                        @click="removeStep(index)">✕</button>
                            </div>
                        </template>

                        <button type="button"
                                class="btn btn-sm btn-outline-primary px-3 py-1 mt-2 text-sm"
                                @click="addStep()">+ افزودن مرحله</button>
                    </div>

                    <div class="mt-6 flex justify-start">
                        <button type="submit" class="btn btn-primary">
                            بروزرسانی فرآیند
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        function flowForm(initialSteps = ['']) {
            return {
                steps: initialSteps.length ? initialSteps : [''],

                addStep() {
                    this.steps.push('');
                },

                removeStep(index) {
                    if (this.steps.length > 1) {
                        this.steps.splice(index, 1);
                    }
                }
            }
        }
    </script>

</x-layout.default>
