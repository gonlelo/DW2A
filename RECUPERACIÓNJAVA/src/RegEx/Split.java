package RegEx;

public class Split {
    public static void main(String[] args) {
        String texto = "Java,Python,C++,JavaScript";
        String[] lenguajes = texto.split(",");

        for (String lenguaje : lenguajes) {
            System.out.println(lenguaje);
        }
    }
}