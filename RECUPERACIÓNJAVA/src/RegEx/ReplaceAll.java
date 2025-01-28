package RegEx;

public class ReplaceAll {
    public static void main(String[] args) {
        String texto = "La fecha es 2025-01-27.";
        String regex = "\\d{4}-\\d{2}-\\d{2}";

        String resultado = texto.replaceAll(regex, "YYYY-MM-DD");
        System.out.println(resultado); // La fecha es YYYY-MM-DD.
    }
}