<x-layout.default>

    <div class="pt-5 grid grid-cols-12 lg:grid-cols-12">

        <div class="panel" x-data="flowForm()">
            <h3 class="text-lg font-bold mb-5">افزودن فرآیند جدید</h3>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="flex items-center p-3.5 rounded text-danger bg-danger-light dark:bg-danger-dark-light mb-3">
                        <span class="ltr:pr-2 rtl:pl-2">{{ $error }}</span>
                    </div>
                @endforeach
            @endif

            <form action="{{ route('flows.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name">نام فرآیند</label>
                    <input name="name" id="name" type="text" class="form-input" required />
                </div>

                <div>
                    <label for="description">توضیحات</label>
                    <textarea name="description" id="description" rows="3" class="form-textarea"></textarea>
                </div>
                <div>
                    <label for="slug">نوع فرآیند</label>
                    <select name="slug" id="slug" class="form-select" required>
                        <option value="" disabled selected>انتخاب کنید...</option>
                        <option value="transaction">معامله</option>
                        <option value="sale">فروش</option>
                        <option value="customer-service">خدمات مشتری</option>
                    </select>
                </div>
                <div>
                    <label>مراحل فرآیند</label>
                    <template x-for="(step, index) in steps" :key="index">
                        <div class="flex items-center gap-2 mb-2">
                            <input type="text" :name="`steps[${index}]`" x-model="steps[index]" class="form-input text-sm p-2 flex-1" required placeholder="مرحله" />
                            <button type="button" class="btn btn-sm btn-outline-danger px-2 py-1 text-sm" @click="removeStep(index)">✕</button>
                        </div>
                    </template>

                    <button type="button" class="btn btn-sm btn-outline-primary px-3 py-1 mt-6 text-sm" @click="addStep()">+ افزودن مرحله</button>
                </div>

                <button type="submit" class="btn btn-primary mt-6">
                    ثبت فرآیند
                </button>
            </form>

        </div>

    </div>

    <script>
        function flowForm() {
            return {
                steps: [''],

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
