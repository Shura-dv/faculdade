package main.java.Exames;

import java.util.Scanner;

public abstract class Exame {
    protected String nome;
    protected String tipoSanguineo;
    protected int anoNascimento;
    protected String resultado;

    public Exame(String nome, String tipoSanguineo, int anoNascimento) {
        this.nome = nome;
        this.tipoSanguineo = tipoSanguineo;
        this.anoNascimento = anoNascimento;
    }

    public abstract void calcularResultado();

    public void mostrarResultado() {
        System.out.println("Nome: " + nome);
        System.out.println("Tipo Sanguíneo: " + tipoSanguineo);
        System.out.println("Resultado: " + resultado);
    }

    public abstract void cadastrarExame(Scanner scanner);
}
