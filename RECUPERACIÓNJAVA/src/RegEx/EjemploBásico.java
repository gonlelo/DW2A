package RegEx;

import java.util.regex.Pattern;
import java.util.regex.Matcher;

public class EjemploBásico {
    public static void main(String[] args) {
        // Expresión regular: exactamente 4 dígitos
        String regex = "\\d{4}";
        String texto = "1234";

        // Compilar el patrón
        Pattern pattern = Pattern.compile(regex);
        // Crear un matcher para el texto
        Matcher matcher = pattern.matcher(texto);

        // Verificar si el texto coincide con el patrón
        if (matcher.matches()) {
            System.out.println("El texto coincide con el patrón.");
        } else {
            System.out.println("El texto no coincide con el patrón.");
        }
    }
}