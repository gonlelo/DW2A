package ArrayLists;

import java.util.ArrayList;

public class EstudiantesBásico {
    public static void main(String[] args) {
        ArrayList<String> estudiantes = new ArrayList<>();

        // Añadir estudiantes
        estudiantes.add("Ana");
        estudiantes.add("Luis");
        estudiantes.add("Carlos");
        estudiantes.add(1,"Iván");

        // Mostrar la lista
        System.out.println("Estudiantes: " + estudiantes);

        // Acceder al segundo estudiante
        System.out.println("Segundo estudiante: " + estudiantes.get(1));

        // Modificar el nombre del primer estudiante
        estudiantes.set(0, "María");
        System.out.println("Después de modificar: " + estudiantes);

        // Eliminar a un estudiante
        estudiantes.remove("Luis");
        System.out.println("Después de eliminar: " + estudiantes);

        // Verificar si un estudiante está en la lista
        System.out.println("¿Carlos está en la lista? " + estudiantes.contains("Carlos"));

        // Iterar sobre la lista
        System.out.println("Lista de estudiantes:");
        for (String estudiante : estudiantes) {
            System.out.println(estudiante);
        }
    }
}