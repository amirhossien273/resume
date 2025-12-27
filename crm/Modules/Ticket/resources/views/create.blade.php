<x-layout.default>

    <div class="pt-5 grid grid-cols-12">

        <div class="panel col-span-12">
            <h3 class="text-lg font-bold mb-5">افزودن تیکت جدید</h3>

            {{-- Errors --}}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="flex items-center p-3.5 rounded text-danger bg-danger-light mb-3">
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            @endif

            <form action="{{ route('tickets.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="flex-1">
                        <label for="transaction_id">معامله</label>
                        <select name="transaction_id" id="transaction_id" class="form-select w-full" required>
                            <option value="" disabled selected>انتخاب کنید...</option>
                            @foreach($transactions as $transaction)
                                <option value="{{ $transaction->id }}"
                                    {{ old('transaction_id') == $transaction->id ? 'selected' : '' }}>
                                    {{ $transaction->name ?? 'معامله #' . $transaction->id }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="flex-1">
                        <label for="priority">اولویت</label>
                        <select name="priority" id="priority" class="form-select w-full" required>
                            @foreach($priorities as $key => $label)
                                <option value="{{ $key }}" {{ old('priority') == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-1">
                        <label for="status">وضعیت</label>
                        <select name="status" id="status" class="form-select w-full" required>
                            @foreach($statuses as $key => $label)
                                <option value="{{ $key }}" {{ old('status') == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-1">
                        <label for="assigned_to">ارجاع به</label>
                        <select name="assigned_to" id="assigned_to" class="form-select w-full">
                            <option value="">بدون ارجاع</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('assigned_to') == $user->id ? 'selected' : '' }}>
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>


                {{-- موضوع --}}
                <div>
                    <label for="subject">موضوع تیکت</label>
                    <input
                        type="text"
                        name="subject"
                        id="subject"
                        class="form-input w-full"
                        value="{{ old('subject') }}"
                        required
                    >
                </div>

                {{-- توضیحات --}}
                <div>
                    <label for="description">توضیحات</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="5"
                        class="form-textarea w-full"
                    >{{ old('description') }}</textarea>
                </div>
                <div>
                    <label for="file">فایل</label>
                    <input
                        type="file"
                        name="file"
                        id="file"
                        class="form-input w-full"
                    >
                </div>




                {{-- Submit --}}
                <button type="submit" class="btn btn-primary mt-6">
                    ثبت تیکت
                </button>
            </form>
        </div>

    </div>

</x-layout.default>
