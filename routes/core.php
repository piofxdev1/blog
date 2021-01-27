<?php

Route::get('/dashboard', [AdminController::class, 'index'])
		->middleware(['auth'])->name('dashboard');