# Projeto: Antigravity 🚀
> **Nota para a IA (System Context):** Você é um desenvolvedor sênior full-stack com foco em UI/UX. Ao ler este documento, seu objetivo é gerar código limpo, modular e seguir estritamente as regras de estilo e stack definidas abaixo. Priorize animações suaves e interfaces que pareçam "sem peso" (antigravity).

## 1. A Vibe (Estética e UX)
* **Design System:** Minimalista, futurista, leve. Muito uso de glassmorphism (vidro fosco), sombras suaves e bordas arredondadas (radius-xl).
* **Cores:** Fundo escuro (Dark Mode First) com tons de "espaço profundo" (Midnight Blue, Deep Purple). Detalhes e botões de ação em cores neon brilhantes (Cyan, Electric Purple).
* **Interações:** Micro-interações são obrigatórias. Botões devem flutuar levemente no hover (daí o nome *Antigravity*). Transições de página devem ser fluidas.
* **Tipografia:** Sans-serif limpa e geométrica (ex: Inter, Plus Jakarta Sans).

## 2. Tech Stack & Regras (Não alucine fora disso)
* **Front-end:** React com Next.js (App Router).
* **Estilização:** Tailwind CSS (uso extensivo de classes utilitárias).
* **Animações:** Framer Motion (para os efeitos de "flutuar" e transições de página).
* **Ícones:** Lucide React.
* **Back-end / Database:** [Preencher - Ex: Supabase / Firebase / Node.js].
* **Regra de Ouro:** Nenhum arquivo deve ter mais de 150 linhas. Extraia componentes sempre que possível.

## 3. Prompts de Features (Copie e cole na IA)

### Feature 1: Navbar Flutuante
> **Prompt:** Crie um componente de Navbar para o projeto Antigravity. Ela deve ficar fixa no topo, ter um efeito de "glassmorphism" (fundo translúcido com blur usando Tailwind). No desktop, os links ficam centralizados. No mobile, use um menu hambúrguer. Adicione um efeito de hover com Framer Motion nos links (um leve levitar de -2px no eixo Y).

### Feature 2: Hero Section (Tela Inicial)
> **Prompt:** Crie a Hero Section principal. O título deve ser "Desafie a Gravidade" com um gradiente de texto fluído. Abaixo, um subtítulo inspirador. O botão de Call to Action (CTA) principal deve pulsar suavemente e ter um brilho externo (glow). Coloque um elemento visual abstrato 3D ou uma forma geométrica animada flutuando ao lado ou ao fundo.

### Feature 3: Card de Apresentação de Dados
> **Prompt:** Crie um componente de Card reutilizável. O card deve ter fundo escuro com opacidade (ex: bg-white/5), borda sutil (border-white/10) e arredondamento grande (rounded-2xl). Quando o usuário passar o mouse, o card deve inclinar levemente em direção ao cursor (efeito tilt 3D sutil) e a borda deve acender com a cor primária.

## 4. Estrutura de Dados / Estado (State Schema)
*(Use esta seção para dar contexto à IA sobre como os dados fluem)*
* **Entidade Principal (ex: User):**
  * `id`: string (UUID)
  * `username`: string
  * `avatar_url`: string (URL)
  * `preferences`: json (tema, animações ativas)

## 5. Checklist de Validação (Antes do Commit)
- [ ] O visual condiz com a vibe "Antigravity" (sem elementos pesados ou quadrados)?
- [ ] O código está responsivo em todas as telas (Mobile First)?
- [ ] Tailwind foi usado corretamente, sem CSS inline desnecessário?
- [ ] Os componentes estão isolados e fáceis de dar manutenção?