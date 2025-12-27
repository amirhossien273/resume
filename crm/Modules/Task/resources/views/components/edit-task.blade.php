    <div>
        <div class="flex xl:flex-row flex-col gap-2.5">
            <div class="flex w-full gap-4">
                <div class="panel w-full xl:mt-0 mt-6 p-4 rounded">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- تراکنش و عنوان کنار هم -->
                        <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-4">
                            <!-- تراکنش -->
                            <div>
                                <label for="src_id" class="block mb-1 font-medium text-gray-700">تراکنش</label>

                                <input type="hidden" name="src_type" value="{{ \Modules\Transaction\App\Models\Transaction::class }}">

                                <select name="src_id" id="src_id" class="form-select w-full" required>
                                    <option value="" disabled>انتخاب کنید...</option>
                                    @foreach(\Modules\Transaction\App\Models\Transaction::all() as $transaction)
                                        <option value="{{ $transaction->id }}"
                                            {{ old('src_id', $task->src_id) == $transaction->id ? 'selected' : '' }}>
                                            {{ $transaction->name ?? $transaction->title ?? 'معامله #' . $transaction->id }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('src_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- عنوان تسک -->
                            <div>
                                <label for="title_id" class="block mb-1 font-medium text-gray-700">عنوان تسک</label>

                                <select name="title_id" id="title_id" class="form-select w-full" required>
                                    <option value="" disabled>انتخاب کنید...</option>

                                    @foreach(\Modules\Task\App\Models\TaskTitle::all() as $title)
                                        <option value="{{ $title->id }}"
                                            @selected(old('title_id', $task->title_id ?? null) == $title->id)>
                                            {{ $title->title }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('title_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- توضیحات -->
                        <div class="mt-4">
                            <label for="description">توضیحات</label>
                            <textarea id="description" name="description" class="form-input">{{ old('description', $task->description) }}</textarea>
                            @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- وضعیت و تاریخ پایان کنار هم -->
                        <div class="mt-4 grid sm:grid-cols-3 grid-cols-1 gap-4">
                            <!-- وضعیت -->
                            <div>
                                <label for="status" class="block mb-1 font-medium text-gray-700">وضعیت</label>
                                <select name="status" class="form-select">
                                    @foreach(\Modules\Task\App\Enums\TaskStatus::cases() as $status)
                                        <option value="{{ $status->value }}"
                                            {{ old('status', $task->status?->value) == $status->value ? 'selected' : '' }}>
                                            {{ $status->label() }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- تاریخ سررسید -->
                            <div>
                                <label for="due_date_edit_{{ $task->id }}" class="block mb-1 font-medium text-gray-700">تاریخ سررسید</label>
                                <input id="due_date_edit_{{ $task->id }}" name="due_date" class="form-input w-full"
                                    value="{{ old('due_date', $task->due_date) }}" />
                                @error('due_date')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="task_time_{{ $task->id }}" class="block mb-1 font-medium text-gray-700">زمان تسک</label>
                                <input id="task_time_{{ $task->id }}" name="task_time" class="form-input w-full"
                                    value="{{ old('task_time', $task->task_time) }}" />
                                @error('task_time')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <!-- انتخاب کارشناسان -->
                        <div class="mt-4 w-full">
                            <label for="assignees">کارشناسان</label>
                            <select name="assignees[]" id="assignees" class="form-input" multiple>
                                @foreach(\Modules\Auth\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}"
                                        {{ in_array($user->id, old('assignees', $task->assignees->pluck('user_id')->toArray())) ? 'selected' : '' }}>
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assignees')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- فایل‌ها (مثل create) --}}
                        <div class="mt-6 w-full" x-data="taskFiles()">
                            <label class="block mb-2 font-medium text-gray-700">فایل‌ها</label>

                            {{-- Dropzone --}}
                            <div
                                class="border border-dashed rounded p-4 cursor-pointer select-none form-input w-full"
                                @click="$refs.fileInput.click()"
                                @dragover.prevent="dragging = true"
                                @dragleave.prevent="dragging = false"
                                @drop.prevent="onDrop($event)"
                                :class="dragging ? 'border-primary' : 'border-gray-300'"
                            >
                                <div class="text-sm text-gray-500">
                                    فایل‌ها را اینجا رها کنید یا کلیک کنید.
                                    <div class="mt-1 text-xs">
                                        برای انتخاب چند فایل در دسکتاپ: Ctrl (ویندوز) یا Cmd (مک)
                                    </div>
                                </div>
                            </div>

                            {{-- input واقعی --}}
                            <input
                                type="file"
                                name="files[]"
                                x-ref="fileInput"
                                class="hidden"
                                multiple
                                accept=".jpg,.jpeg,.png,.pdf"
                                @change="onPick($event)"
                            />

                            {{-- فایل‌های جدید انتخاب شده --}}
                            <template x-if="newFiles.length">
                                <div class="mt-3">
                                    <div class="text-sm font-medium text-gray-700 mb-2">فایل‌های انتخاب شده (جدید)</div>
                                    <ul class="space-y-2 text-sm">
                                        <template x-for="(f, idx) in newFiles" :key="idx">
                                            <li class="flex items-center justify-between p-2 rounded border border-gray-200 dark:border-gray-700">
                                                <div class="flex items-center gap-2">
                                                    <span x-text="f.name"></span>
                                                    <span class="text-xs text-gray-500" x-text="`(${Math.round(f.size/1024)} KB)`"></span>
                                                </div>
                                                <button type="button" class="text-danger text-xs" @click="removeNew(idx)">حذف</button>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </template>

                            @error('files')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            @error('files.*')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            {{-- فایل‌های قبلی --}}
                            <div class="mt-4">
                                <div class="text-sm font-medium text-gray-700 mb-2">فایل‌های آپلود شده</div>

                                @if(($task->medias ?? collect())->count())
                                    <ul class="space-y-2 text-sm">
                                        @foreach($task->medias as $media)
                                            <li class="flex items-center justify-between p-2 rounded border border-gray-200 dark:border-gray-700">
                                                <div class="flex items-center gap-3">
                                                    <span>{{ $media->name }}</span>

                                                    <a class="text-primary text-xs underline"
                                                       href="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($media->path) }}"
                                                       target="_blank">
                                                        مشاهده
                                                    </a>
                                                </div>

                                                <label class="flex items-center gap-2 text-danger cursor-pointer">
                                                    <input type="checkbox" class="form-checkbox"
                                                           name="delete_media_ids[]"
                                                           value="{{ $media->id }}">
                                                    حذف
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="text-xs text-gray-500 mt-2">
                                        فایل‌هایی که تیک «حذف» بخورند، با زدن دکمه بروزرسانی حذف می‌شوند.
                                    </div>
                                @else
                                    <div class="text-sm text-gray-500">فایلی ثبت نشده است.</div>
                                @endif

                                @error('delete_media_ids')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                @error('delete_media_ids.*')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <input type="hidden" name="redirect" value="{{$redirect}}">
                            <button type="submit" class="btn btn-primary">بروزرسانی تسک</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Flatpickr JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/assets/js/flatpicker-fa.js"></script>

    <script>
        // Dropzone + list manager (Alpine)
        function taskFiles() {
            return {
                dragging: false,
                newFiles: [],

                onPick(e) {
                    this.addFiles(e.target.files);
                },

                onDrop(e) {
                    this.dragging = false;
                    this.addFiles(e.dataTransfer.files);
                },

                addFiles(fileList) {
                    const incoming = Array.from(fileList || []);
                    const key = f => `${f.name}-${f.size}`;
                    const existing = new Set(this.newFiles.map(key));

                    incoming.forEach(f => {
                        if (!existing.has(key(f))) this.newFiles.push(f);
                    });

                    this.syncToInput();
                },

                removeNew(idx) {
                    this.newFiles.splice(idx, 1);
                    this.syncToInput();
                },

                syncToInput() {
                    const dt = new DataTransfer();
                    this.newFiles.forEach(f => dt.items.add(f));
                    this.$refs.fileInput.files = dt.files;
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const dueDateInput = document.getElementById('due_date_edit_{{ $task->id }}');
            const taskTimeInput = document.getElementById('task_time_{{ $task->id }}');
            console.log("dueDateInput: ", dueDateInput.value );
            console.log("taskTimeInput: ", taskTimeInput.value );
            if(dueDateInput) {
                flatpickr(dueDateInput, {
                    dateFormat: 'Y-m-d',
                    defaultDate: dueDateInput.value || null,
                    locale: 'fa',
                });
            }

            if(taskTimeInput) {
                flatpickr(taskTimeInput, {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: 'H:i',
                    defaultDate: taskTimeInput.value || null,
                    time_24hr: true,
                    locale: 'fa'
                });
            }
        });
    </script>