<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    /**
     * Ver listado de cursos.
     * Ajuste actual: admin, docente y estudiante pueden listar.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role_id, [1, 2, 3], true);
    }

    /**
     * Ver un curso específico.
     */
    public function view(User $user, Course $course): bool
    {
        return in_array($user->role_id, [1, 2, 3], true);
    }

    /**
     * Crear cursos: solo admin.
     */
    public function create(User $user): bool
    {
        return $user->role_id === 1;
    }

    /**
     * Actualizar cursos: solo admin.
     */
    public function update(User $user, Course $course): bool
    {
        return $user->role_id === 1;
    }

    /**
     * Eliminar cursos: solo admin.
     */
    public function delete(User $user, Course $course): bool
    {
        return $user->role_id === 1;
    }

    /**
     * Restaurar cursos: solo admin.
     */
    public function restore(User $user, Course $course): bool
    {
        return $user->role_id === 1;
    }

    /**
     * Ver cursos inactivos: solo admin.
     */
    public function viewInactive(User $user): bool
    {
        return $user->role_id === 1;
    }
}