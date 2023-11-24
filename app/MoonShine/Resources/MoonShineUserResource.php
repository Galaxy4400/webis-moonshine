<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Email;
use MoonShine\Fields\Image;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Tab;
use MoonShine\Fields\Password;
use Illuminate\Validation\Rule;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tabs;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Heading;
use MoonShine\Models\MoonshineUser;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Resources\ModelResource;
use MoonShine\Models\MoonshineUserRole;
use MoonShine\Fields\Relationships\BelongsTo;


#[Icon('heroicons.outline.users')]
class MoonShineUserResource extends ModelResource
{
	public string $title = 'Администраторы';

	public string $model = MoonshineUser::class;

	public string $column = 'name';

	public array $with = ['moonshineUserRole'];


	public function formFields(): array
	{
		return [
			Grid::make([
				Column::make('Главное', [
					Block::make('Основные данные', [
						ID::make(),
	
						Text::make('Имя', 'name')
							->required(),
	
						Email::make('E-mail', 'email')
							->showOnExport()
							->required(),
	
						BelongsTo::make(
							'Роли',
							'moonshineUserRole',
							static fn (MoonshineUserRole $model) => $model->name,
							new MoonShineUserRoleResource(),
						)->required(),

						Image::make('Аватар', 'avatar')
							->showOnExport()
							->disk(config('moonshine.disk', 'public'))
							->dir('moonshine_users')
							->allowedExtensions(['jpg', 'png', 'jpeg', 'gif']),
	
						Date::make('Дата создания', 'created_at')
							->format("d.m.Y")
							->default(now()->toDateTimeString())
							->sortable()
							->hideOnForm(),
					])
				])->columnSpan(8),

				Column::make('Пароль', [
					Block::make($this->getItem() ? 'Изменить пароль' : 'Создать пароль', [
						Password::make('Пароль', 'password')
							->customAttributes(['autocomplete' => 'new-password'])
							->eye(),
	
						PasswordRepeat::make('Повторите пароль', 'password_repeat')
							->customAttributes(['autocomplete' => 'confirm-password'])
							->eye(),
					])
				])->columnSpan(4),
			]),
		];
	}


	public function indexFields(): array
	{
		return [
			ID::make()->sortable(),
			Image::make('Аватар', 'avatar'),
			Text::make('Имя', 'name')->sortable(),
			Email::make('E-mail', 'email'),
			BelongsTo::make('Роли', 'moonshineUserRole', resource: new MoonShineUserRoleResource()),
			Date::make('Дата создания', 'created_at')->format("d.m.Y")->sortable(),
		];
	}


	public function detailFields(): array
	{
		return [
			ID::make(),
			Image::make('Аватар', 'avatar'),
			Text::make('Имя', 'name')->sortable(),
			Email::make('E-mail', 'email'),
			BelongsTo::make('Роли', 'moonshineUserRole', resource: new MoonShineUserRoleResource()),
			Date::make('Дата создания', 'created_at')->format("d.m.Y")->sortable(),
		];
	}


	/**
	 * @return array{name: string, moonshine_user_role_id: string, email: mixed[], password: string}
	 */
	public function rules($item): array
	{
		return [
			'name' => 'required',
			'moonshine_user_role_id' => 'required',
			'email' => ['sometimes', 'bail', 'required', 'email', Rule::unique('moonshine_users')->ignoreModel($item)],
			'password' => $item->exists
				? ['sometimes', 'nullable', 'min:6', 'required_with:password_repeat', 'same:password_repeat']
				: ['required', 'min:6', 'required_with:password_repeat', 'same:password_repeat'],
		];
	}

	public function search(): array
	{
		return ['id', 'name'];
	}
}
