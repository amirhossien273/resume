
    <div class="pt-5 grid grid-cols-12 lg:grid-cols-12">
        <div class="panel">
            <h3 class="text-lg font-bold mb-5">افزودن  جدید</h3>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="flex items-center p-3.5 rounded text-danger bg-danger-light dark:bg-danger-dark-light mb-3">
                        <span class="ltr:pr-2 rtl:pl-2">{{ $error }}</span>
                    </div>
                @endforeach
            @endif

            <form action="{{ route('tasks.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="flex-1">
                        <label for="src_id" class="block mb-1 font-medium text-gray-700">معامله</label>

                        <input type="hidden" name="src_type" value="{{ \Modules\Transaction\App\Models\Transaction::class }}">

                        <select name="src_id" id="src_id" class="form-select w-full" required>
                            <option value="" disabled selected>انتخاب کنید...</option>
                            @foreach(\Modules\Transaction\App\Models\Transaction::all() as $transaction)
                                <option value="{{ $transaction->id }}">
                                    {{ $transaction->name ?? $transaction->title ?? 'معامله #' . $transaction->id }}
                                </option>
                            @endforeach
                        </select>

                        @error('src_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="flex-1">
                        <label for="title_id" class="block mb-1 font-medium text-gray-700">
                            عنوان تسک
                        </label>

                        <select name="title_id" id="title_id" class="form-select w-full" required>
                            <option value="" disabled selected>انتخاب کنید...</option>

                            @foreach(\Modules\Task\App\Models\TaskTitle::all() as $title)
                                <option value="{{ $title->id }}"
                                    {{ old('title_id', $task->title_id ?? null) == $title->id ? 'selected' : '' }}>
                                    {{ $title->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('title_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div>
                    <label for="description">توضیحات</label>
                    <textarea name="description" id="description" rows="3" class="form-textarea">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- وضعیت و تاریخ سررسید کنار هم -->
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="flex-1">
                        <label for="status" class="block mb-1 font-medium text-gray-700">وضعیت</label>
                        <select name="status" class="form-select">
                            @foreach(\Modules\Task\App\Enums\TaskStatus::cases() as $status)
                                <option value="{{ $status->value }}"
                                    {{ old('status', \Modules\Task\App\Enums\TaskStatus::Pending->value) == $status->value ? 'selected' : '' }}>
                                    {{ $status->label() }}
                                </option>
                            @endforeach
                        </select>



                        @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex-1" x-data="formTask">
                        <label for="due_date">تاریخ سررسید</label>
                        <input id="due_date" x-model="date1" name="due_date" class="form-input w-full"
                        value="{{ old('due_date') }}" placeholder="تاریخ" />

                        @error('due_date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="task_time">زمان تسک</label>
                        <input type="text" name="task_time" id="task_time" class="form-input w-full"
                               value="{{ old('task_time', $task->task_time ?? '') }}" placeholder="ساعت" />
                    </div>
                </div>

                <!-- کارشناسان -->
                <div class="mt-4 w-full">
                    <label for="assignees">کارشناسان</label>
                    <select name="assignees[]" id="assignees" class="form-input" multiple>
                        @foreach(\Modules\Auth\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}" {{ (collect(old('assignees'))->contains($user->id)) ? 'selected' : '' }}>
                                {{ $user->first_name }} {{ $user->last_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('assignees')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4 w-full" x-data="multiUpload()">
                    <label class="block mb-1 font-medium text-gray-700">فایل‌ها</label>

                    <!-- Dropzone -->
                    <div
                        class="border border-dashed rounded p-4 cursor-pointer select-none"
                        :class="dragging ? 'border-primary' : 'border-gray-300'"
                        @click="$refs.fileInput.click()"
                        @dragover.prevent="dragging = true"
                        @dragleave.prevent="dragging = false"
                        @drop.prevent="onDrop($event)"
                    >
                        <div class="text-sm text-gray-600">
                            فایل‌ها را اینجا رها کنید یا کلیک کنید.
                            <span class="block mt-1 text-xs text-gray-500">
                برای انتخاب چند فایل در دسکتاپ: Ctrl (ویندوز) یا Cmd (مک) را نگه دارید.
            </span>
                        </div>
                    </div>

                    <!-- Real input -->
                    <input
                        type="file"
                        name="files[]"
                        x-ref="fileInput"
                        class="hidden"
                        multiple
                        accept=".jpg,.jpeg,.png,.pdf"
                        @change="onChange($event)"
                    />

                    <!-- Selected files -->
                    <template x-if="files.length">
                        <ul class="mt-3 text-sm space-y-1">
                            <template x-for="(f, idx) in files" :key="idx">
                                <li class="flex items-center justify-between">
                                    <span x-text="f.name"></span>
                                    <button type="button" class="text-danger text-xs" @click="remove(idx)">
                                        حذف
                                    </button>
                                </li>
                            </template>
                        </ul>
                    </template>

                    @error('files')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    @error('files.*')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <input type="hidden" name="redirect" value="{{$redirect}}">
                <button type="submit" class="btn btn-primary mt-6">
                    ثبت تسک
                </button>
            </form>

        </div>

    </div>

    <!-- Flatpickr و Jalali -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/assets/js/flatpicker-fa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jalaali-js/dist/jalaali.js"></script>

    <script>

        document.addEventListener("alpine:init", () => {
            Alpine.data("formTask", () => ({
           
                date1: '',
                init() {
                         console.log("dsdsdsdsds");
                    const { toJalaali } = jalaali;
                    const g = { gy: 2025, gm: 12, gd: 9 };
                    const j = toJalaali(g.gy, g.gm, g.gd);
                    this.date1 = `${j.jy}-${String(j.jm).padStart(2, '0')}-${String(j.jd).padStart(2, '0')}`;
                    console.log("date1:  ", this.date1);
                    flatpickr(document.getElementById('due_date'), {
                        dateFormat: 'Y-m-d',
                        defaultDate: this.date1,
                        locale: 'fa',
                    });
                }
            }));
        });
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#task_time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: 'fa'
            });
        });

    </script>

    <script>
        function multiUpload() {
            return {
                dragging: false,
                files: [],
                onChange(e) {
                    this.addFiles(e.target.files);
                },
                onDrop(e) {
                    this.dragging = false;
                    this.addFiles(e.dataTransfer.files);
                    // sync to input so it submits
                    this.syncToInput();
                },
                addFiles(fileList) {
                    // Merge (avoid duplicates by name+size)
                    const incoming = Array.from(fileList || []);
                    const key = f => `${f.name}-${f.size}`;
                    const existingKeys = new Set(this.files.map(key));
                    incoming.forEach(f => {
                        if (!existingKeys.has(key(f))) this.files.push(f);
                    });
                    this.syncToInput();
                },
                remove(idx) {
                    this.files.splice(idx, 1);
                    this.syncToInput();
                },
                syncToInput() {
                    const dt = new DataTransfer();
                    this.files.forEach(f => dt.items.add(f));
                    this.$refs.fileInput.files = dt.files;
                }
            }
        }
    </script>
