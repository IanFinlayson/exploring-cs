-- output-blocks.lua
-- makes it so we put in specific latex code for the output blocks

function CodeBlock(cb)
  if FORMAT ~= "latex" then
    return nil
  end

  local is_output = false
  for _, c in ipairs(cb.classes) do
    if c == "output" then
      is_output = true
      break
    end
  end
  if not is_output then
    return nil
  end

  local text = cb.text

  -- Normalize CRLF/CR -> LF to avoid weird glyphs in PDF
  text = text:gsub("\r\n", "\n")
  text = text:gsub("\r", "\n")

  -- IMPORTANT: ensure a trailing newline so the environment ends cleanly
  if text:sub(-1) ~= "\n" then
    text = text .. "\n"
  end

  local latex =
    "\\begin{OutputShaded}\n" ..
    text ..
    "\\end{OutputShaded}\n"

  return pandoc.RawBlock("latex", latex)
end
